<?php

include_once("ingredient.php");

class IngredientManager extends Manager
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getIngredients()
    {

        $ingredients = [];

        foreach($this->pdo->query("SELECT * FROM PC_INGREDIENTS") as $row)
        {

            $ing = new Ingredient(
                $row["ING_NAME"], 
                $row["ING_DESCRIPTION"]
            );

            $ing->setId($row["ING_ID"]);

            array_push($ingredients,  $ing);
        }

        return $ingredients;
    }

    public function getIngredientById(int $id)
    {
        foreach($this->pdo->query("SELECT * FROM PC_INGREDIENTS WHERE ING_ID = ".$id) as $row)
        {

            $ing = new Ingredient(
                $row["ING_NAME"], 
                $row["ING_DESCRIPTION"]
            );

            $ing->setId($row("ING_ID"));

            return $ing;
        }
    }

    public function getIngredientByName(string $name)
    {
        foreach($this->pdo->query("SELECT * FROM PC_INGREDIENTS WHERE ING_NAME = '".$name."'") as $row)
        {

            $ing = new Ingredient(
                $row["ING_NAME"], 
                $row["ING_DESCRIPTION"]
            );

            $ing->setId(intval($row["ING_ID"]));

            return $ing;
        }
    }

    public function updateIngredient(Ingredient $ingredient)
    {
        $request = "UPDATE PC_INGREDIENTS SET ING_NAME = ?, ING_DESCRIPTION = ? WHERE ING_ID = ".$ingredient->getId();
        $statement = $this->pdo->prepare($request);
        $statement->execute([$ingredient->getName(), $ingredient->getDescription()]); 
    }
    
    public function insertIngredient(Ingredient $ingredient)
    {
        $request = "INSERT INTO PC_INGREDIENTS(ING_NAME, ING_DESCRIPTION) VALUES (?, ?)";
        $statement = $this->pdo->prepare($request);
        $statement->execute([$ingredient->getName(), $ingredient->getDescription()]); 
    }
}

?>