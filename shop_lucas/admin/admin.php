<?php

    session_start();
    
    // redirige l'utilisateur si il est pas connecte en admin
    if(!isset($_SESSION["cExyOXiDZBt"])) {
        header("Location: ../login.php");
    }
    if(empty($_SESSION["cExyOXiDZBt"])) {
        header("Location: ../login.php");
    }

    require("../config/commandes.php");

    $Types = afficherType();
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <!-- Icone --> 
        <link rel="shortcut icon" href="../annexe/favicon.ico" type="image/x-icon"/>
        <link rel="icon" href="annexe/favicon.ico" type="image/x-icon"/>
        <!-- Style -->
        <link href="../style.css" rel="stylesheet" type="text/css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
        
        <title>Admin Shop</title>
    </head>
    <body>
        <!-- Barre Navigation -->
        <nav>
            <ul class='navbar_l'>
                <li class='navbar_e'><a style="color: #fff;" class='navbar_a' href="../index.php">Boutique</a></li>
                <li class='navbar_e'><a style="color: #fff;" class='navbar_a' href="#">Ajouter un produit</a></li>
                <li class='navbar_e'><a style="color: #fff;" class='navbar_a' href="delete.php">Modifier un produit</a></li>
                <li class='navbar_e'><a style="color: #fff;" class='navbar_a' href="logout.php">Logout</a></li>
            </ul>
        </nav>
        <br><br>
            <!-- Formulaire pour ajouter un produit -->
            <form class="login" method="post">
                <div class="form-group">
                    <label for="exampleInputEmail1">Titre de l'image*</label>
                    <input type="name" class="form-control" name="image" placeholder="Lien de l'image" required>
                </div>

                <!-- liste deroulante pour le type du vetement -->
                <label for="exampleInputEmail1">Type du vêtement*</label>
                <select name='type' class="champ" >
                        <?php foreach($Types as $type): ?>
                            <option value="<?= $type->type_id ?>"><?= $type->type_nom ?></option>
                        <?php endforeach; ?>
                </select>
                
                <div class="form-group">
                    <label for="exampleInputPassword1">Modèle*</label>
                    <input type="text" class="form-control" placeholder="Jean bleu..." name="modele" required>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Description*</label>
                    <textarea class="form-control" name="desc" placeholder="Un joli jean tout bleu qui perm..." required></textarea>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Taille*</label>
                    <input type="text" class="form-control" placeholder="XXS, XS, S, M, L, XL, XXL" name="taille" required>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Prix*</label>
                    <input type="number" class="form-control" placeholder="Prix en EURO(€)" name="prix" required>
                </div>
                <br>
                <!-- bouton mettre en ligne le produit -->
                <input type="submit" class="btn btn-primary" name="valider" value="Mettre en ligne le produit">
            </form>
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
<?php
    // l'utilisateur a appuyer sur soumettre
    if(isset($_POST['valider']))
    {
        // toutes les cases sont bien remplies et ne sont pas vide
        if(isset($_POST['image']) AND isset($_POST['type']) AND isset($_POST['modele']) AND isset($_POST['desc']) AND isset($_POST['taille']) AND isset($_POST['prix']))
        {
            if(!empty($_POST['image']) AND !empty($_POST['type']) AND !empty($_POST['modele']) AND !empty($_POST['desc']) AND !empty($_POST['taille']) AND !empty($_POST['prix']))
            {

                // remplissage les variables par les éléments du formulaires
                $image = htmlspecialchars(strip_tags($_POST['image'])); 
                $type = htmlspecialchars(strip_tags($_POST['type']));
                $modele = htmlspecialchars(strip_tags($_POST['modele']));
                $desc = htmlspecialchars(strip_tags($_POST['desc']));
                $taille = htmlspecialchars(strip_tags($_POST['taille']));
                $prix = htmlspecialchars(strip_tags($_POST['prix']));

                // on ajoute les données a la base de données
                try
                {

                    ajouter($type, $modele, $desc, $taille, $prix, $image);
                    
                }

                catch(Exception $e)
                {
                    $e->getMessage();
                }

            }
        }
    }
    
?>