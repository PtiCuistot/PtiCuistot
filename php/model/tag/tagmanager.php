<?php

include_once("tag.php");

class TagManager extends Manager
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getTagById(int $id)
    {
        foreach($this->pdo->query("SELECT * FROM PC_TAGS WHERE TA_ID = ".$id) as $row)
        {
            return new Tag(
                $row["TA_ID"], 
                $row["TA_CONTENT"], 
                $row["TA_STATUT"]
            );
        }
    }

    public function getTagByName(string $name)
    {
        foreach($this->pdo->query("SELECT * FROM PC_TAGS WHERE TA_CONTENT = ".$name) as $row)
        {
            return new Tag(
                $row["TA_ID"], 
                $row["TA_CONTENT"], 
                $row["TA_STATUT"]
            );
        }
    }

    public function updateTag(Tag $tag)
    {
        $request = "UPDATE PC_TAGS SET TA_CONTENT = ?, TA_STATUT = ? WHERE TA_ID = ".$tag->getId();
        $statement = $this->pdo->prepare($request); 
        $statement->execute([$tag->getContent(), $tag->getStatut()]);
    }
}

?>