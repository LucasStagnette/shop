<?php

    session_start();
    require("../config/commandes.php");
    
    // on verifie que l'utilisateur est login en admin
    if(!isset($_SESSION["cExyOXiDZBt"]))
    {
        header('Location: ../login.php');
    }

    if(empty($_SESSION["cExyOXiDZBt"])) 
    {
        header('Location: ../login.php');
    }

    $Produits = afficher();
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <!-- Icone --> 
        <link rel="shortcut icon" href="../annexe/favicon.ico" type="image/x-icon"/>
        <link rel="icon" href="../annexe/favicon.ico" type="image/x-icon"/>
        <!-- style -->
        <link href="../style.css" rel="stylesheet" type="text/css">
        <title>Admin Shop</title>
    </head>
    <body onload="scrollToPos()"><!-- on reviens ou l'utilisateur etait dans la page -->
        <!-- Barre Navigation -->
        <nav>
            <ul class='navbar_l'>
                <li class='navbar_e'><a class='navbar_a' href="../index.php">Boutique</a></li>
                <li class='navbar_e'><a class='navbar_a' href="admin.php">Ajouter un produit</a></li>
                <li class='navbar_e'><a class='navbar_a' href="#">Modifier un produit</a></li>
                <li class='navbar_e'><a style="color: #fff;" class='navbar_a' href="../members/landing.php">Compte</a></li>
                <li class='navbar_e'><a class='navbar_a' href="../members/deconnexion.php">Logout</a></li>
            </ul>
        </nav>
        <br>
        <div class="container">
            <!-- affichage de chaque produit -->
            <?php foreach($Produits as $produit): ?>
            <div style="width: 400px; height:500px;position: relative;" class="product">

                <img style="max-height:394px; max-width:300px; margin-bottom:200px; margin:auto;" src="<?= $produit->image_produit?>">
                <br><br><br><br><br><br>

                <div style="position: absolute; bottom:0; margin-bottom:30px; display:flex; justify-content:space-between">
                    <!-- bouton supprimer le produit -->
                    <button><a style="text-decoration: none; color:#fff" href="../config/commandes.php?action=supprimer&parametre=<?php echo urlencode($produit->id); ?>">Supprimer</a></button>
                    <br>
                    <!-- bouton pour accede a la page de modification avec l'id du produit -->
                    <button><a style="text-decoration: none; color:#fff" href="edit.php?idproduit=<?= $produit->id ?>">Modifier</a></button>
                    <br>
                </div>

            </div>
            <?php endforeach; ?>
        </div>
        <footer>
            <p>Copyright 2022 Lucas Fashion</p>
            <ul>
                <li><a href="../pages/terms.php">Termes et conditions</a></li>
                <li><a href="../pages/privacy.php">Politique de confidentialité</a></li>
                <li><a href="../pages/contact.php">Contact</a></li>
            </ul>
        </footer>
    </body>
</html>


<script>
    // sauvegarde la position avant de quitter la page
    window.addEventListener("beforeunload", 
    function() {
        localStorage.setItem("scrollPos", window.scrollY);
    });

    // scroll a la position ou etait l'utilisateur
    function scrollToPos() {

        var scrollPos = localStorage.getItem("scrollPos");
        window.scrollTo(0, scrollPos);
    }
</script>