<?php

include_once("manager.php");
include_once('recipe.php');

class RecipeManager extends Manager
{
    public function __construct()
    {
        parent::__construct();
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
                $row['REP_UPDATED']);
            $r->setId($row['REP_ID']);
            return $r;
        }
        return null;
    }

    public function insertRecipe(Recipe $recipe)
    {
        $query = "INSERT INTO PC_RECIPE(US_ID, REP_TITLE, REP_CONTENT, REP_IMAGE, REP_CREATED, REP_UPDATED, REP_STATUT) VALUES(1, ?, ?, ?, ?, ?, 1)";
        echo $query + "<br>";
        $statement = $this->pdo->prepare($query);
        echo $statement + "<br>";
        $statement->execute([$recipe->getTitle(), $recipe->getContent(), $recipe->getImage(), $recipe->getCreated(), $recipe->getUpdated()]);
    }

    public function updateRecipe(Recipe $recipe)
    {
        $query = "UPDATE PC_RECIPE SET REP_ID = ?, REP_TITLE = ?, REP_IMAGE = ?, REP_CREATED = ?, REP_UPDATED = ?, REP_STATUS = ? WHERE REP_ID = '".$recipe->getId()."'";
        echo $query;
        $statement = $this->pdo->prepare($query);
        $statement->execute([
            $recipe->getTitle(),
            $recipe->getContent(), 
            $recipe->getImage(),
            $recipe->getCreated(), 
            $recipe->getUpdated(),
            $recipe->getStatut()
        ]);
    }
}
?>