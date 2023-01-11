<?php
    session_start();
    require("config/commandes.php");
    require_once 'config/connexion.php';

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
            $req = $bdd->prepare('SELECT * FROM produits WHERE id = ?');
            $req->execute(array($id));
            $info_produit_temp = $req->fetch();
            $prix = $info_produit_temp['prix'];
        }
    }
    
    // on prend l'id de l'utilisateur
    $req = $bdd->prepare('SELECT * FROM utilisateurs WHERE token = ?');
    $req->execute(array($_SESSION['user']));
    $userinfo = $req->fetch();
    $id_user = $userinfo['id'];

    


    // pour commander le produit
    if(($_SERVER['REQUEST_METHOD'] === 'POST'))
    {
        
        $quantite = (int)$_POST['quantity'];
        if($quantite > 0)
        {
            commander($quantite, ($quantite * $prix), $id, $id_user);
        }
        else{
            header("location:#"); 
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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
        <title>Boutique en Ligne de Vêtements</title>
    </head>
    <body>
        <!-- Barre de navigation -->
        <nav>
            <ul class='navbar_l'>
                <li class='navbar_e'><a style="color: #fff;" class='navbar_a' href="index.php">Boutique</a></li>
                <?php
                    // si il est connecter en admin, affichage de "admin" 
                    if(isset($_SESSION["cExyOXiDZBt"]))
                    {
                        ?><li class='navbar_e'><a style="color: #fff;" class='navbar_a' href="admin/admin.php">Admin</a></li><?php
                        $sessionadmin = true;
                    }
                    // si il est connecter
                    if(isset($_SESSION["user"]))
                    {
                        ?><li class='navbar_e'><a style="color: #fff;" class='navbar_a' href="members/landing.php">Compte</a></li><?php
                        ?><li class='navbar_e'><a style="color: #fff;" class='navbar_a' href="members/deconnexion.php">Logout</a></li><?php
                    }
                
                    // si il n'est pas connecter en admin, affichage de "login"
                    if(!isset($_SESSION["user"]))
                    {
                        ?><li class='navbar_e'><a style="color: #fff;" class='navbar_a' href="members/index.php">Login</a></li><?php
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

                    
                    <?php 
                        // si il est connecter on affiche le bouton commander
                        if(isset($_SESSION["user"]))
                        {
                            ?><br>
                                <center>
                                    <form style="width: 300px;" action="#" method="POST" class="login">
                                        <label for="quantity">Commander :</label>
                                        <input style="width: 256px;" placeholder="Nombre " class="form-control" value="1" type="number" id="quantity" name="quantity">
                                        <input class="form-control" type="submit" name="commander" value="Commander">
                                    </form>
                                </center>
                            <?php
                        }
                    ?><br><br>
                    <!-- bouton pour revenir a la boutique -->
                    <center><a href="index.php"><button style="margin:auto;align-items:center; border-radius:5px">Retour à la boutique</button></a></center><br>
                </div>

            </div>
        <?php endforeach?>
        <br>
        <footer>
            <p>Copyright 2022 Lucas Fashion</p>
            <ul>
                <li><a style="color: #fff;" href="pages/terms.php">Termes et conditions</a></li>
                <li><a style="color: #fff;" href="pages/privacy.php">Politique de confidentialité</a></li>
                <li><a style="color: #fff;" href="pages/contact.php">Contact</a></li>
            </ul>
        </footer>
    </body>
</html>