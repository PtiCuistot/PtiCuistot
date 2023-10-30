<?php

class RecipeManager extends Manager
{
    public function construct()
    {
        parent::__construct();
    }

    public function getRecipes($limit)
    {

        $recipes = [];

        foreach($this->pdo->query("SELECT * FROM PC_RECIPE WHERE REP_VALIDATE = 1 LIMIT ".$limit) as $row)
        {
            $r = new Recipe(
                $row['US_ID'],
                $row['REP_TITLE'],
                $row['REP_CONTENT'],
                $row['REP_IMAGE'],
                $row['REP_CREATED'],
                $row['REP_UPDATED'],
                $row['REP_VALIDATE'],
                $row['CAT_ID']);
            $r->setId($row['REP_ID']);

            array_push($recipes, $r);
        }

        return $recipes;
    }

    public function getUnvalidateRecipe()
    {
        $recipes = []; 
        foreach($this->pdo->query("SELECT * FROM PC_RECIPE WHERE REP_VALIDATE = 0") as $row)
        {
            $r = new Recipe(
                $row['US_ID'],
                $row['REP_TITLE'],
                $row['REP_CONTENT'],
                $row['REP_IMAGE'],
                $row['REP_CREATED'],
                $row['REP_UPDATED'],
                $row['REP_VALIDATE'],
                $row['CAT_ID']);
            $r->setId($row['REP_ID']);

            array_push($recipes, $r);
        }
        return $recipes;
    }


    public function getRecipeById(int $id)
    {
        foreach($this->pdo->query("SELECT * FROM PC_RECIPE WHERE REP_ID = ".$id) as $row)
        {
            $r = new Recipe(
                $row['US_ID'],
                $row['REP_TITLE'],
                $row['REP_CONTENT'],
                $row['REP_IMAGE'],
                $row['REP_CREATED'],
                $row['REP_UPDATED'],
                $row['REP_VALIDATE'],
                $row['CAT_ID']);
            $r->setId($row['REP_ID']);
            return $r;
        }
        return null;
    }

    public function insertRecipe(Recipe $recipe)
    {
        $query = "INSERT INTO PC_RECIPE(US_ID, REP_TITLE, REP_CONTENT, REP_IMAGE, REP_VALIDATE, REP_STATUT, CAT_ID) VALUES(?, ?, ?, ?, ?, 1, ?)";
        $statement = $this->pdo->prepare($query);
        $statement->execute([
            intval($recipe->getUserId()),
            $recipe->getTitle(),
            $recipe->getContent(),
            $recipe->getImage(),
            $recipe->getValidate(),
            intval($recipe->getCatId())
        ]);

        foreach($this->pdo->query("SELECT MAX(REP_ID) max FROM PC_RECIPE") as $row)
        {
            return intval($row['max']);
        }
    
    }

    public function updateRecipe(Recipe $recipe)
    {
        $query = "UPDATE PC_RECIPE SET REP_TITLE = ?, REP_CONTENT = ?, REP_IMAGE = ?, REP_UPDATED = CURRENT_TIMESTAMP(), REP_VALIDATE = ?, REP_STATUT = ?, REP_CAT_ID = ? WHERE REP_ID = ?";
        $title = $this->pdo->quote($recipe->getTitle());
        $content = $this->pdo->quote($recipe->getContent());
        $image = $this->pdo->quote($recipe->getImage());
        $validate = intval($recipe->getValidate());
        $statut = intval($recipe->getStatut());
        $catId = intval($recipe->getCatId());
        $id = $recipe->getId();

        $query = "UPDATE PC_RECIPE SET REP_TITLE = $title, REP_CONTENT = $content, REP_IMAGE = $image, REP_UPDATED = CURRENT_TIMESTAMP(), REP_VALIDATE = $validate, REP_STATUT = $statut, CAT_ID = $catId WHERE REP_ID = $id";

        $this->pdo->query($query);
    }

    public function addTag(Recipe $recipe, Tag $tag)
    {
        $query = "INSERT INTO PC_TAG_REFERENCE (REP_ID, TA_ID, TA_CONTENT) VALUES (?, ?, ?)"; 
        $statement = $this->pdo->prepare($query);
        $statement->execute([
            $recipe->getId(), 
            $tag->getId(), 
            $tag->getContent()
        ]);
    }

    public function getTag(Recipe $recipe)
    {
        $tagArray = [];
        $tagManager = new TagManager();
        foreach($this->pdo->query("SELECT * FROM PC_TAG_REFERENCE WHERE REP_ID = ".$recipe->getId()) as $row)
        {
            array_push($tagArray, $tagManager->getTagById($row["TA_ID"]));
        }   
        return $tagArray;
    }

    public function getRecipeIngredients(Recipe $recipe)
    {
        $ingArray = []; 
        foreach($this->pdo->query("SELECT ing.ing_name, iw_weight, iw_unity FROM PC_INGREDIENTS_WEIGHT 
        JOIN PC_INGREDIENTS ing USING(ING_ID) 
        JOIN PC_RECIPE USING(REP_ID) 
        WHERE REP_ID = ".$recipe->getId()) as $row)
        {
            array_push($ingArray, $row);
        }   
        return $ingArray;
    }
    
    public function getRecipeByCategory(Category $category)
    {
        $recipes = []; 
        foreach($this->pdo->query("SELECT * FROM PC_RECIPE  WHERE CAT_ID = ".$category->getId()) as $row)
        {
            $r = new Recipe(
                $row['US_ID'],
                $row['REP_TITLE'],
                $row['REP_CONTENT'],
                $row['REP_IMAGE'],
                $row['REP_CREATED'],
                $row['REP_UPDATED'],
                $row['REP_VALIDATE'],
                $row['CAT_ID']);
            $r->setId($row['REP_ID']);

            array_push($recipes, $r);
        }
        return $recipes;
    }

    public function getRecipeByTitle(string $title)
    {
        $recipes = []; 
        foreach($this->pdo->query("SELECT * FROM PC_RECIPE  WHERE REP_TITLE LIKE %".$title."%") as $row)
        {
            $r = new Recipe(
                $row['US_ID'],
                $row['REP_TITLE'],
                $row['REP_CONTENT'],
                $row['REP_IMAGE'],
                $row['REP_CREATED'],
                $row['REP_UPDATED'],
                $row['REP_VALIDATE'],
                $row['CAT_ID']);
            $r->setId($row['REP_ID']);

            array_push($recipes, $r);
        }
        return $recipes;
    }

    public function getRecipeByIngredients(array $ingListId)
    {
        $recipe = []; 
        foreach($this->pdo->query("SELECT REP_ID, REP_TITLE, REP_CONTENT
        FROM PC_RECIPE
        INNER JOIN ingredients_recettes ON recettes.REP_ID = ingredients_recettes.REP_ID
        WHERE ingredients_recettes.ING_ID IN (" . implode(",", $ingListId) . ")") as $row)
        {
            $r = new Recipe(
                $row['US_ID'],
                $row['REP_TITLE'],
                $row['REP_CONTENT'],
                $row['REP_IMAGE'],
                $row['REP_CREATED'],
                $row['REP_UPDATED'],
                $row['REP_VALIDATE'],
                $row['CAT_ID']);
            $r->setId($row['REP_ID']);

            array_push($recipes, $r);
        }
        return $recipes;
    }
}
?>