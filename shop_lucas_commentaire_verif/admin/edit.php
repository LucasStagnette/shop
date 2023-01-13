<?php

    session_start();
    require("../config/commandes.php");
    
    // verification qu'il est login en admin
    if(!isset($_SESSION["cExyOXiDZBt"]))
    {
        header('Location: ../members/index.php');
    }

    if(empty($_SESSION["cExyOXiDZBt"])) 
    {
        header('Location: ../members/index.php');
    }

    // Verifie l'identifiant du produit
    if(!isset($_GET['idproduit'])){
        header("Location: delete.php");
    }
    
    if(empty($_GET['idproduit']) OR !is_numeric($_GET['idproduit'])){
        header("Location: delete.php");
    }
    
    // on decharge l'identifiant et le produit dans 2 variables, $id et $produit
    if(isset($_GET['idproduit'])){
        
        if(!empty($_GET['idproduit']) OR is_numeric($_GET['idproduit']))
        {
            $id = $_GET['idproduit'];
            $Produits = afficherProduit($id);
        }
    }

    $Types = afficherType();

    // si le bouton modifier est clique
    if(isset($_POST['valider']))
    {
        // verifie que les champs sont bien remplis
        if(isset($_POST['image']) AND isset($_POST['modele']) AND isset($_POST['desc']) AND isset($_POST['taille']) AND isset($_POST['prix']))
        {
            if(!empty($_POST['image']) AND !empty($_POST['modele']) AND !empty($_POST['desc']) AND !empty($_POST['taille']) AND !empty($_POST['prix']))
            {
                // remplissage les variables par les éléments du formulaires
                $image = htmlspecialchars(strip_tags($_POST['image']));
                $modele = htmlspecialchars(strip_tags($_POST['modele']));
                $desc = htmlspecialchars(strip_tags($_POST['desc']));
                $taille = htmlspecialchars(strip_tags($_POST['taille']));
                $prix = htmlspecialchars(strip_tags($_POST['prix']));
                
                // verifie l'id du produit
                if(isset($_GET['idproduit'])){
    
                    if(!empty($_GET['idproduit']) OR is_numeric($_GET['idproduit']))
                    {
                        $id = $_GET['idproduit'];
                        
                       
                    }
                }
                // on modifie le produit
                try 
                {
                    modifier($modele, $desc, $taille, $prix, $image, $id);
                    header("Location: delete.php");
                    echo 'erreur';
                } 
                catch (Exception $e) 
                {
                    $e->getMessage();
                }
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <!-- Icone --> 
        <link rel="shortcut icon" href="../annexe/favicon.ico" type="image/x-icon"/>
        <link rel="icon" href="../annexe/favicon.ico" type="image/x-icon"/>
        <!-- style -->
        <link href="../style.css" rel="stylesheet" type="text/css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
        <title>Admin Shop</title>
    </head>
    <body>
        <!-- Barre Navigation -->
        <nav>
            <ul class='navbar_l'>
                <li class='navbar_e'><a style="color: #fff; transition: all 0.2s;" class='navbar_a' href="../index.php">Boutique</a></li>
                <li class='navbar_e'><a style="color: #fff;" class='navbar_a' href="admin.php">Ajouter un produit</a></li>
                <li class='navbar_e'><a style="color: #fff;" class='navbar_a' href="delete.php">Modifier un produit</a></li>
                <li class='navbar_e'><a style="color: #fff;" class='navbar_a' href="commandes.php">Commandes</a></li>
                <li class='navbar_e'><a style="color: #fff;" class='navbar_a' href="../members/landing.php">Compte</a></li>
                <li class='navbar_e'><a style="color: #fff;" class='navbar_a' href="../members/deconnexion.php">Logout</a></li>
            </ul>
        </nav>
        <br>
        <?php foreach ($Produits as $produit): ?>
            <!-- Formulaire pour editer un produit -->
            <form class="login" method="post">
                <div class="form-group">
                    <label for="exampleInputEmail1">Titre de l'image</label>
                    <input type="name" class="form-control" name="image" value="<?= $produit->image_produit ?>" placeholder="Lien de l'image..." required>
                    <img style="width: 10%;" src="<?= $produit->image_produit ?>">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Modèle</label>
                    <input type="text" class="form-control" value="<?= $produit->modele ?>" placeholder="Jean bleu..." name="modele" required>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Description</label>
                    <textarea class="form-control" name="desc" placeholder="Un joli jean tout bleu qui perm..." required><?= $produit->description_produit ?></textarea>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Taille</label>
                    <input type="text" class="form-control" value="<?= $produit->taille ?>" placeholder="XXS, XS, S, M, L, XL, XXL" name="taille" required>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Prix</label>
                    <input type="number" class="form-control" value="<?= $produit->prix ?>" placeholder="Prix en EURO(€)" name="prix" required>
                </div>
                <br>
                <!-- bouton modifier -->
                <input type="submit" class="btn btn-primary" name="valider" value="Modifier">
            </form>
        <?php endforeach ?>
        <footer>
            <p>Copyright 2022 Lucas Fashion</p>
            <ul>
                <li><a style="color: #fff;" href="../pages/terms.php">Termes et conditions</a></li>
                <li><a style="color: #fff;" href="../pages/privacy.php">Politique de confidentialité</a></li>
                <li><a style="color: #fff;" href="../pages/contact.php">Contact</a></li>
            </ul>
        </footer>
    </body>
</html>
