<?php

class CommentManager extends Manager
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getCommentById(int $id)
    {
        foreach($this->pdo->query("SELECT * FROM PC_COMMENT WHERE CO_ID = ".$id) as $row)
        {
            $c = new Comment(
                $row['US_ID'],
                $row['CO_TEXT']
            ); 
            $c->setId(intval($row['CO_ID']));
            return $c;
        }
    }

    public function insertComment(Comment $c)
    {
        $query = "INSERT INTO PC_COMMENT(US_ID, CO_TEXT) VALUES(?,?)";  
        $statement = $this->pdo->prepare($query);
        $statement->execute([
            $c->getUserId(),
            $c->getContent()
        ]);

        foreach($this->pdo->query("SELECT MAX(CO_ID) max FROM PC_COMMENT") as $row)
        {
            return intval($row['max']);
        }
    }

}
?>