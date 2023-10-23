<?php

include_once("manager.php");
include_once('recipe.php');

class RecipeManager extends Manager
{
    public function construct()
    {
        parent::construct();
    }

    public function getRecipeById(int $id): ?Recipe
    {
        foreach($this->pdo->query("SELECT * FROM PC_RECIPE WHERE REP_ID = ".$id) as $row)
        {
            $r = new Recipe(
                $row['REP_TITLE'],
                $row['REP_CONTENT'],
                $row['REP_IMAGE'],
                $row['REP_CREATED'],
                $row['REP_UPDATED'],
                $row['CAT_ID']);
            $r->setId($row['US_ID']);
            return $r;
        }
        return null;
    }

    public function insertRecipe(Recipe $recipe)
    {
        $query = "INSERT INTO PC_RECIPE(US_ID, REP_TITLE, REP_CONTENT, REP_IMAGE, REP_STATUT, CAT_ID) VALUES(2, ?, ?, ?, 1, ?)";
        $statement = $this->pdo->prepare($query);
        $statement->execute([
            $recipe->getTitle(),
            $recipe->getContent(),
            $recipe->getImage(),
            $recipe->getCatId()
        ]);
        echo 'INSERT INTO PC_RECIPE(US_ID, REP_TITLE, REP_CONTENT, REP_IMAGE, REP_STATUT, CAT_ID) VALUES(1, "';
        echo $recipe->getTitle();
        echo '", "';
        echo $recipe->getContent();
        echo '", "';
        echo $recipe->getImage();
        echo '", 1,';
        echo $recipe->getCatId();
        echo ')';
    }

    public function updateRecipe(Recipe $recipe)
    {
        $query = "UPDATE PC_RECIPE SET REP_ID = ?, REP_TITLE = ?, REP_IMAGE = ?, REP_CREATED = ?, REP_UPDATED = ?, REP_STATUS = ?, REP_CAT_ID = ? WHERE REP_ID = '".$recipe->getId()."'";
        echo $query;
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
}
?>