<?php

include_once('usertype.php');

class UserTypeManager extends Manager
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getUserTypeById(int $id) : UserType
    {
        foreach($this->pdo->query("SELECT * FROM PC_USER_TYPE WHERE UT_ID = ".$id) as $row)
        {
            return new UserType($row["UT_ID"], $row["UT_NAME"]);
        }
    }

    public function updateUserType(UserType $ut)
    {
        $query = "UDPATE PC_USER_TYPE SET UT_NAME = ? WHERE UT_ID = ".$ut->getId(); 
        $statement = $this->pdo->prepare($query);
        $statement->execute([$ut->getName()]);
    }
}

?>