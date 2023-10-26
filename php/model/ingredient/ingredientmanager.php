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

        foreach($this->pdo->query("SELECT * FROM PC_INGREDIENTS ORDER BY ING_NAME") as $row)
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
                $row["ING_NAME"]                
            );

            $ing->setId(intval($row["ING_ID"]));

            return $ing;
        }
    }

    public function updateIngredient(Ingredient $ingredient)
    {
        $request = "UPDATE PC_INGREDIENTS SET ING_NAME = ? WHERE ING_ID = ".$ingredient->getId();
        $statement = $this->pdo->prepare($request);
        $statement->execute([$ingredient->getName()]); 
    }
    
    public function insertIngredient(Ingredient $ingredient)
    {
        $request = "INSERT INTO PC_INGREDIENTS(ING_NAME) VALUES (?)";
        $statement = $this->pdo->prepare($request);
        $statement->execute([$ingredient->getName()]); 

        foreach($this->pdo->query("SELECT MAX(ING_ID) max FROM PC_INGREDIENTS") as $row)
        {
            return intval($row['max']);
        }
    
    }
}

?>