<?php

class UserManager extends Manager
{
    public function __construct()
    {
        
    }

    public function getUserById($id)
    {
        foreach($this->pdo->query("SELECT * FROM PC_USER WHERE US_ID = ".$id) as $row)
        {
            return $row;
        }    
    }

    public function insertUser(User $user)
    {
    
        if($user->getFirstname() == null && $user->getLastname() == null)
        {
            $query = "INSERT INTO PC_USER(UT_ID, US_USERNAME, US_EMAIL, US_PASSWORD, US_STATUT) VALUES(1, ?, ?, ?, )";
            $statement = $this->pdo->prepare($query);
            $statement->execute([$user->getUsername(), $user->getEmail(), $user->getPassword()]);
        }
        
        if($user->getFirstname() == null && $user->getLastname() != null)
        {
            $firstname = "";
        }
        elseif($user->getFirstname() != null && $user->getLastname() == null)
        {
            $lastname = "";
        }
    
        $query = "INSERT INTO PC_USER(US_USERNAME, US_EMAIL, US_PASSWORD, US_FIRSTNAME, US_LASTNAME) VALUES(?, ?, ?, ?, ?)";
        $statement = $this->pdo->prepare($query);
        $statement->execute([$user->getUsername(), $user->getEmail(), $user->getPassword(), $user->getFirstname(), $user->getLastname()]);
    }
}

?>