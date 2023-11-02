<?php

include_once("category.php");

class CategoryManager extends Manager
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getCategories() 
    {
        $categories = [];

        foreach($this->pdo->query("SELECT * FROM PC_CATEGORY") as $row)
        {
            $cat = new Category($row["CAT_TITLE"], $row["CAT_DESCRIPTION"], $row["CAT_STATUT"]);
            $cat->setId($row["CAT_ID"]); 
            array_push($categories, [$cat]);
        }

        return $categories;
    }

    public function getCategoryById(int $id)
    {
        foreach($this->pdo->query("SELECT * FROM PC_CATEGORY WHERE CAT_STATUT = ".$id) as $row)
        {
            $cat = new Category($row["CAT_TITLE"], $row["CAT_DESCRIPTION"], $row["CAT_STATUT"]);
            $cat->setId($row["CAT_ID"]); 
            return $cat;
        }
    }

    public function insertCategory(Category $cat)
    {
        $request = "INSERT INTO PC_CATEGORY(CAT_TITLE, CAT_DESCRIPTION, CAT_STATUT) VALUES(?,?,?)";
        $statement = $this->pdo->prepare($request);
        $statement->execute([$cat->getTitle(), $cat->getDescription(), $cat->getStatut()]);
    }

    public function updateCategory(Category $cat)
    {
        $request = "UDPATE PC_CATEGORY SET CAT_TITLE = ?, CAT_DESCRIPTION = ?, CAT_STATUT = ? WHERE CAT_ID = ".$cat->getId(); 
        $statement = $this->pdo->prepare($request); 
        $statement->execute([$cat->getTitle(), $cat->getDescription(), $cat->getStatut()]);
    }
}

?>