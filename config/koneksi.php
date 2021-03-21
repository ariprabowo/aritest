<?php
define('host','localhost');
define('username','root');
define('password','alfarisyi96');
define('db', 'db_production');
 
try{
    $conn = new PDO("mysql:host=".host."; dbname=".db, username, password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
}catch (PDOException $e){
    echo "ERROR : " .$e->getMessage();
}