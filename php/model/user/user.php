<?php
class User
{
    private string $username; 
    private string $email; 
    private string $password; 
    private string $firstname; 
    private string $lastname;
    private int $statut;
    private string $accountType;
    private ?int $id;

    public function __construct($username, $email, $password, $firstname=null, $lastname=null)
    {
        $this->username = $username; 
        $this->email = $email; 
        $this->password = $password;
        $this->firstname = $firstname; 
        $this->lastname = $lastname;
        $this->statut = 1;
        $this->accountType = 1;
        $this->id = null;
    }

    /**
     * Get the value of username
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set the value of username
     */
    public function setUsername($username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     */
    public function setEmail($email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     */
    public function setPassword($password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of firstname
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set the value of firstname
     */
    public function setFirstname($firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get the value of lastname
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set the value of lastname
     */
    public function setLastname($lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get the value of statut
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * Set the value of statut
     */
    public function setStatut($statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * Get the value of accountType
     */
    public function getAccountType()
    {
        return $this->accountType;
    }

    /**
     * Set the value of accountType
     */
    public function setAccountType($accountType): self
    {
        $this->accountType = $accountType;

        return $this;
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId($id): self
    {
        if($this->id == null)
        {
            $this->id = $id;
            return $this;
        }
        else
        {
            throw new Exception("Cannot redifined ID");
        }
    }
}

?>