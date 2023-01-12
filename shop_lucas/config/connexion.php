<?php

// on se connecte a la base de donnees sinon on recoit un message
try{
    
    $access = new pdo("mysql:host=localhost;dbname=shop_lucas;charset=utf8", "root", "");
    $access-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    $bdd = new PDO("mysql:host=localhost;dbname=shop_lucas;charset=utf8", "root", "");

}   catch (Exception $e){
    $e->getMessage();
    
}
?>