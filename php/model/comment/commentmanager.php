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
            $c->setValidate(intval($row['CO_VALIDATE']));
            return $c;
        }
    }

    public function insertComment(Comment $c)
    {
        $query = "INSERT INTO PC_COMMENT(US_ID, CO_TEXT, CO_VALIDATE) VALUES(?,?,?)";  
        $statement = $this->pdo->prepare($query);
        $statement->execute([
            $c->getUserId(),
            $c->getContent(), 
            $c->getValidate(),
        ]);

        foreach($this->pdo->query("SELECT MAX(CO_ID) max FROM PC_COMMENT") as $row)
        {
            return intval($row['max']);
        }
    }

    public function getUnvalidate()
    {
        $comments = [];
        foreach($this->pdo->query("SELECT * FROM PC_COMMENT WHERE CO_VALIDATE = 0") as $row)
        {
            $c = new Comment(
                $row['US_ID'],
                $row['CO_TEXT']
            ); 
            $c->setId(intval($row['CO_ID']));
            $c->setValidate(intval($row['CO_VALIDATE']));
            array_push($comments, $c);
        } 
        return $comments;
    }

    public function validate(Comment $c)
    {
        $query = "UPDATE PC_COMMENT SET CO_VALIDATE = 1 WHERE CO_ID =".$c->getId(); 
        $statement = $this->pdo->prepare($query);
        $statement->execute();
    }

    public function delete(Comment $c)
    {
        $query = "DELETE FROM PC_COMMENT_DESCRIBE WHERE CO_ID = ".$c->getId(); 
        $statement = $this->pdo->prepare($query);
        $statement->execute();

        $query = "DELETE FROM PC_COMMENT WHERE CO_ID =  ".$c->getId(); 
        $statement = $this->pdo->prepare($query);
        $statement->execute();
    }
}
?>