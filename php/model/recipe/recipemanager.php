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
                $row['REP_NOTE'], 
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
                $row['REP_NOTE'], 
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
                $row['REP_NOTE'], 
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
        $query = "INSERT INTO PC_RECIPE(US_ID, REP_TITLE, REP_CONTENT, REP_IMAGE, REP_NOTE, REP_VALIDATE, REP_STATUT, CAT_ID) VALUES(?, ?, ?, ?, ?, ?, 1, ?)";
        $statement = $this->pdo->prepare($query);
        $statement->execute([
            intval($recipe->getUserId()),
            $recipe->getTitle(),
            $recipe->getContent(),
            $recipe->getImage(),
            $recipe->getNote(),
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
        $query = "UPDATE PC_RECIPE SET REP_TITLE = ?, REP_CONTENT = ?, REP_IMAGE = ?, REP_NOTE = ?, REP_UPDATED = CURRENT_TIMESTAMP(), REP_VALIDATE = ?, REP_STATUT = ?, CAT_ID = ? WHERE REP_ID = ?";
        $title = $this->pdo->quote($recipe->getTitle());
        $content = $this->pdo->quote($recipe->getContent());
        $image = $this->pdo->quote($recipe->getImage());
        $validate = intval($recipe->getValidate());
        $statut = intval($recipe->getStatut());
        $catId = intval($recipe->getCatId());
        $id = $recipe->getId();

        $query = "UPDATE PC_RECIPE SET REP_TITLE = $title, REP_CONTENT = $content, REP_IMAGE = $image, REP_NOTE = ".$recipe->getNote().", REP_UPDATED = CURRENT_TIMESTAMP(), REP_VALIDATE = $validate, REP_STATUT = $statut, CAT_ID = $catId WHERE REP_ID = $id";
        $this->pdo->query($query);
    }

    public function addTag(Recipe $recipe, Tag $tag)
    {
        $query = "INSERT INTO PC_TAG_REFERENCE (REP_ID, TA_ID) VALUES (?, ?)"; 
        $statement = $this->pdo->prepare($query);
        
        try
        {
            $statement->execute([
                $recipe->getId(), 
                $tag->getId()
            ]);
        }catch(PDOException $e)
        {
            return;
        }
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
                $row['REP_NOTE'],
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
        foreach($this->pdo->query("SELECT * FROM PC_RECIPE  WHERE REP_TITLE LIKE '%".$title."%'") as $row)
        {
            $r = new Recipe(
                $row['US_ID'],
                $row['REP_TITLE'],
                $row['REP_CONTENT'],
                $row['REP_IMAGE'],
                $row['REP_NOTE'],
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
        $recipes = []; 
        $inputId = [];

        foreach($this->pdo->query("SELECT DISTINCT *
        FROM PC_INGREDIENTS_WEIGHT
        WHERE ING_ID IN (" . implode(",", $ingListId) . ")") as $row)
        {
            if(!in_array($row['REP_ID'], $inputId))
            {
                array_push($recipes, $this->getRecipeById($row['REP_ID']));
                array_push($inputId, $row['REP_ID']);
            }
        }
        return $recipes;
    }

    public function sendComment(User $author, Recipe $recipe, string $comment)
    {
        $c = new Comment($author->getId(),  $comment);
        $cm = new CommentManager();
        $c = $cm->getCommentById($cm->insertComment($c));
        $query = 'INSERT INTO PC_COMMENT_DESCRIBE(CO_ID, REP_ID) VALUES(?, ?)';
        $statement = $this->pdo->prepare($query);
        $statement->execute(
            [
                $c->getId(), 
                $recipe->getId()
            ]
        );
    }

    public function getComments(Recipe $recipe)
    {
        $cm = new CommentManager();

        $comments = [];
        foreach($this->pdo->query("SELECT CO_ID FROM PC_COMMENT_DESCRIBE WHERE REP_ID =".$recipe->getId()) as $row)
        {
            array_push($comments, $cm->getCommentById($row['CO_ID']));
        }

        return $comments;
    }
}
?>