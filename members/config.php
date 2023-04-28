<?php
// connexion a la base de donne
try {
    $bdd = new PDO("mysql:host=localhost;dbname=shop_lucas;charset=utf8", "root", "");
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}
