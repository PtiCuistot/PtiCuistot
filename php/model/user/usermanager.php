<?php

class UserManager extends Manager
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getUserById(int $id): ?User
    {
        foreach($this->pdo->query("SELECT * FROM PC_USER WHERE US_ID = ".$id) as $row)
        {
            $u = new User(
                $row['US_USERNAME'], 
                $row['US_EMAIL'], 
                $row['US_PASSWORD'], 
                $row['US_FIRSTNAME'], 
                $row['US_LASTNAME']);
            $u->setId($row['US_ID']);
            return $u;
        }    
        return null;
    }

    public function getUserByMail(string $mail): ?User
    {
        foreach($this->pdo->query("SELECT * FROM PC_USER WHERE US_EMAIL = '".$mail."'") as $row)
        {
            $u = new User(
                $row['US_USERNAME'], 
                $row['US_EMAIL'], 
                $row['US_PASSWORD'], 
                $row['US_FIRSTNAME'], 
                $row['US_LASTNAME']);
            $u->setId($row['US_ID']);
            return $u;
        }   
        return null;
    }

    public function insertUser(User $user)
    {
    
        if($user->getFirstname() == null && $user->getLastname() == null)
        {
            $query = "INSERT INTO PC_USER(UT_ID, US_USERNAME, US_EMAIL, US_PASSWORD, US_STATUT) VALUES(1, ?, ?, ?, 1)";
            $statement = $this->pdo->prepare($query);
            $statement->execute([$user->getUsername(), $user->getEmail(), $user->getPassword()]);
        }
        
        if($user->getFirstname() == null && $user->getLastname() != null)
        {
            $user->setFirstname("");
        }
        elseif($user->getFirstname() != null && $user->getLastname() == null)
        {
            $user->setLastname("");
        }
    
        $query = "INSERT INTO PC_USER(UT_ID, US_USERNAME, US_EMAIL, US_PASSWORD, US_FIRSTNAME, US_LASTNAME, US_STATUT) VALUES(1, ?, ?, ?, ?, ?, 1)";
        $statement = $this->pdo->prepare($query);
        $statement->execute([$user->getUsername(), $user->getEmail(), $user->getPassword(), $user->getFirstname(), $user->getLastname()]);
    }

    public function updateUser(User $user)
    {
        $query = "UPDATE PC_USER SET UT_ID = ?, US_USERNAME = ?, US_EMAIL = ?, US_PASSWORD = ?, US_FIRSTNAME = ?, US_LASTNAME = ?,  US_STATUT = ? WHERE US_EMAIL = '".$user->getEmail()."'";
        echo $query;
        $statement = $this->pdo->prepare($query);
        $statement->execute([
            $user->getAccountType(),
            $user->getUsername(), 
            $user->getEmail(),
            $user->getPassword(), 
            $user->getFirstname(),
            $user->getLastname(),
            $user->getStatut()
        ]);
    }

    public function checkPassword(string $mail, string $password) :?User
    {
        $u = $this->getUserByMail($mail);
        echo  $u->getPassword();
        if(password_verify($password, $u->getPassword()))
        {
            return $u;
        }
        else
        {
            return null;
        }
    }
}

?>