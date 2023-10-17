<?php 

require ('../database/connector.php');

class Manager 
{

    protected $pdo;

    public function __construct()
    {
        $pdo = initPDO();
    }
}

?>