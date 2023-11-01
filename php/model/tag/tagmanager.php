<?php

include_once("tag.php");

class TagManager extends Manager
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getTags()
    {
        $tags = [];
        foreach($this->pdo->query("SELECT * FROM PC_TAGS") as $row)
        {
            $tag = new Tag( 
                $row["TA_CONTENT"], 
                $row["TA_STATUT"]
            );
            
            $tag->setId($row["TA_ID"]);

            array_push($tags, $tag);
        }
        return $tags;
    }

    public function getTagById(int $id)
    {
        foreach($this->pdo->query("SELECT * FROM PC_TAGS WHERE TA_ID = ".$id) as $row)
        {

            $tag = new Tag( 
                $row["TA_CONTENT"], 
                $row["TA_STATUT"]
            );
            
            $tag->setId($row["TA_ID"]);

            return $tag;
        }
    }

    public function getTagByName(string $name)
    {
        foreach($this->pdo->query("SELECT * FROM PC_TAGS WHERE TA_CONTENT = '".$name."'") as $row)
        {
            $tag = new Tag( 
                $row["TA_CONTENT"], 
                $row["TA_STATUT"]
            );
            
            $tag->setId($row["TA_ID"]);

            return $tag;
        }
    }

    public function updateTag(Tag $tag)
    {
        $request = "UPDATE PC_TAGS SET TA_CONTENT = ?, TA_STATUT = ? WHERE TA_ID = ".$tag->getId();
        $statement = $this->pdo->prepare($request); 
        $statement->execute([$tag->getContent(), $tag->getStatut()]);
    }

    public function insertTag(Tag $tag)
    {
        $request = "INSERT INTO PC_TAGS(TA_CONTENT, TA_STATUT) VALUES (?, ?)";
        $statement = $this->pdo->prepare($request); 
        $statement->execute([$tag->getContent(), $tag->getStatut()]);
        foreach($this->pdo->query("SELECT MAX(TAG_ID) max FROM PC_TAGS") as $row)
        {
            return intval($row['max']);
        }
    
    }
}

?>