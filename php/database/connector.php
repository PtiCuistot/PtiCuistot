<?php

$dbHost = '';
$dbName = '';
$dbUser = '';
$dbPass = '';

/**
 * Initialize global variables with configuration file
 */
function initConfVar()
{
    global $dbHost, $dbName, $dbUser, $dbPass;

    $envFilePath = '.env';

    if (file_exists($envFilePath))
    {
        $envData = parse_ini_file($envFilePath);

        $dbHost = $envData['DB_HOST'];
        $dbName = $envData['DB_NAME'];
        $dbUser = $envData['DB_USER'];
        $dbPass = $envData['DB_PASS'];    
    }
    else
    {
        throw new Exception("[PC0] Essential `.env` file not found :: Critical | Path : ".$envFilePath);
    }
}

/**
 * Initialize a workable PDO
 * @return PDO the PDO
 * @see initConfVar()
 */
function initPDO()
{
    initConfVar();
    global $dbHost, $dbName, $dbUser, $dbPass;
    
    try
    {
        $pdo = new PDO("mysql:host=".$dbHost.";dbname=".$dbName, $dbUser, $dbPass);
    }
    catch(Exception $e)
    {
        throw new Exception("[PC1] An error occured during PDO Cration:: Critical | Path : ".$envFilePath);
    }
    
    return $pdo;
}

?>