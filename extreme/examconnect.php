<?php

$dbcon = "mysql:host=localhost; dbname=classtest";
$dbname = "root";
$dbpassword = "";

try{
    $pdo = new PDO ($dbcon,$dbname,$dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo"connection failed".$e->getMessage();
}