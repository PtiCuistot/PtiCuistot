<?php

include_once("manager.php");
include_once('recipe.php');


class RecipeManager extends Manager
{
    public function construct()
    {
        parent::__construct();
    }

    public function getRecipes(int $limit=10)
    {

        $recipes = [];

        foreach($this->pdo->query("SELECT * FROM PC_RECIPE LIMIT".$limit) as $row)
        {
            $r = new Recipe(
                $row['US_ID'],
                $row['REP_TITLE'],
                $row['REP_CONTENT'],
                $row['REP_IMAGE'],
                $row['REP_CREATED'],
                $row['REP_UPDATED'],
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
                $row['CAT_ID']);
            $r->setId($row['REP_ID']);
            return $r;
        }
        return null;
    }

    public function insertRecipe(Recipe $recipe)
    {
        $query = "INSERT INTO PC_RECIPE(US_ID, REP_TITLE, REP_CONTENT, REP_IMAGE, REP_STATUT, CAT_ID) VALUES(?, ?, ?, ?, 1, ?)";
        $statement = $this->pdo->prepare($query);
        $statement->execute([
            intval($recipe->getUserId()),
            $recipe->getTitle(),
            $recipe->getContent(),
            $recipe->getImage(),
            intval($recipe->getCatId())
        ]);
    }

    public function updateRecipe(Recipe $recipe)
    {
        $query = "UPDATE PC_RECIPE SET REP_ID = ?, REP_TITLE = ?, REP_IMAGE = ?, REP_CREATED = ?, REP_UPDATED = ?, REP_STATUS = ?, REP_CAT_ID = ? WHERE REP_ID = '".$recipe->getId()."'";
        $statement = $this->pdo->prepare($query);
        $statement->execute([
            $recipe->getTitle(),
            $recipe->getContent(), 
            $recipe->getImage(),
            $recipe->getCreated(), 
            $recipe->getUpdated(),
            $recipe->getStatut(),
            $recipe->getCatId()
        ]);
    }

    public function addTag(Recipe $recipe, Tag $tag)
    {
        $query = "INSERT INTO REFERENCED_BY (REP_ID, TA_ID, TA_CONTENT) VALUES (?, ?, ?)"; 
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
        foreach($this->pdo->query("SELECT * FROM REFERENCED_BY WHERE REP_ID = ".$recipe->getId()) as $row)
        {
            array_push($tagArray, $tagManager->getTagById($row["TA_ID"]));
        }   
        return $tagArray;
    }
}
?>