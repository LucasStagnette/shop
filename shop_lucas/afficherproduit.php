<?php
    session_start();
    require("config/commandes.php");

    // Verifie l'identifiant du produit
    if(!isset($_GET['idproduit'])){
        header("Location: index.php");
    }
    
    if(empty($_GET['idproduit']) OR !is_numeric($_GET['idproduit'])){
        header("Location: index.php");
    }
    
    // on decharge l'identifiant et le produit dans 2 variables, $id et $produit
    if(isset($_GET['idproduit'])){
        
        if(!empty($_GET['idproduit']) OR is_numeric($_GET['idproduit']))
        {
            $id = $_GET['idproduit'];
            $Produits = afficherProduit($id);
        }
    }
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8"/>
        <!-- Icone -->
        <link rel="shortcut icon" href="annexe/favicon.ico" type="image/x-icon"/>
        <link rel="icon" href="annexe/favicon.ico" type="image/x-icon"/>
        <link rel="stylesheet" type="text/css" href="style.css">
        <title>Boutique en Ligne de Vêtements</title>
    </head>
    <body>
        <!-- Barre de navigation -->
        <nav>
            <ul class='navbar_l'>
                <li class='navbar_e'><a class='navbar_a' href="index.php">Boutique</a></li>
                <?php
                    // si il est connecter en admin, affichage de "admin" et "logout"
                    if(isset($_SESSION["cExyOXiDZBt"]))
                    {
                        ?><li class='navbar_e'><a class='navbar_a' href="admin/admin.php">Admin</a></li><?php
                        $sessionadmin = true;
                    }

                    if(isset($_SESSION["cExyOXiDZBt"]))
                    {
                        ?><li class='navbar_e'><a class='navbar_a' href="members/landing.php">Compte</a></li><?php
                        ?><li class='navbar_e'><a class='navbar_a' href="members/deconnexion.php">Logout</a></li><?php
                    }
                
                    // si il n'est pas connecter en admin, affichage de "login"
                    if(!isset($_SESSION["cExyOXiDZBt"]))
                    {
                        ?><li class='navbar_e'><a class='navbar_a' href="login.php">Login</a></li><?php
                        $sessionadmin = false;
                    }
                ?>
            </ul>
        </nav>
        <br><br>
        <?php foreach($Produits as $produit):?>
            <!-- on affiche les attributs du produit -->
            <div style="margin:auto; width: 1000px; height:600px;" class="product">
                <img style="height:569px; width:539px;" src="<?= $produit->image_produit?>">

                <div style="display:inline; max-width:408px;  ">
                    <h3><?= $produit->modele ?></h3>
                    <p><?= $produit->taille?></p>
                    <p><?= $produit->description_produit ?></p>
                    <p><?= $produit->prix?> €</p>

                    <!-- bouton pour revenir a la boutique -->
                    <center><a href="index.php"><button style="margin:auto;align-items:center">Retour à la boutique</button></a></center>
                </div>

            </div>
        <?php endforeach?>
        <footer>
            <p>Copyright 2022 Lucas Fashion</p>
            <ul>
                <li><a href="pages/terms.php">Termes et conditions</a></li>
                <li><a href="pages/privacy.php">Politique de confidentialité</a></li>
                <li><a href="pages/contact.php">Contact</a></li>
            </ul>
        </footer>
    </body>
</html>