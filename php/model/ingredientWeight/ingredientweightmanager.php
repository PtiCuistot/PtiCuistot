<?php 

include_once("ingredientweight.php");

class IngredientWeightManager extends Manager
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getIngredientWeightById(int $id)
    {
        foreach($this->pdo->query("SELECT * FROM PC_INGREDIENTS_WEIGHT WHERE IW_ID = ".$id) as $row)
        {
            $iw = new IngredientWeight($row["REP_ID"], $row["ING_ID"], $row["IW_WEIGHT"], $row["IW_UNITY"]);
            $iw->setId($row["IW_ID"]);
            return $iw; 
        }
    }

    public function getIngredientWeightByRecipe(Recipe $recipe)
    {
        $response = [];

        foreach($this->pdo->query("SELECT * FROM PC_INGREDIENTS_WEIGHT WHERE REP_ID = ".$recipe->getId()) as $row)
        {
            $t = [$row["IW_WEIGHT"], $row["IW_UNITY"]];
            $response.array_push($t);
        }
        return $response;
    }

    public function insertIngredientWeight(IngredientWeight $iw)
    {
        $request = "INSERT INTO PC_INGREDIENTS_WEIGHT(REP_ID, ING_ID, IW_WEIGHT, IW_UNITY) VALUES (?, ?, ?, ?)";
        $statement = $this->pdo->prepare($request);
        $statement->execute([$iw->getRecipeId(), $iw->getIngredientId(), $iw->getWeight(), $iw->getUnity()]);
    }

    public function updateIngredientWeight(IngredientWeight $iw)
    {
    }
}

?>