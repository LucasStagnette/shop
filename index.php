<?php
session_start();
require("config/commandes.php");
// on stock les produits dans la variable $Produits
$Produits = afficher();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <link rel="stylesheet" type="text/css" href="./style.css" />
    <meta charset="utf-8" />
    <!-- Icone -->
    <link rel="shortcut icon" href="annexe/favicon.ico" type="image/x-icon" />
    <link rel="icon" href="annexe/favicon.ico" type="image/x-icon" />

    <title>Boutique en Ligne de Vêtements</title>
    <script>
        // on sauvegarde la position y de la page au moment ou l'utilisateur part
        window.addEventListener("beforeunload", function() {
            localStorage.setItem("scrollPos", window.scrollY);
        });

        // on revient a la position y de la page au chargement de la page
        function scrollToPos() {
            var scrollPos = localStorage.getItem("scrollPos");
            window.scrollTo(0, scrollPos);
        }
    </script>

</head>

<body onload="scrollToPos()"><!-- appelle de la fonction au chargement de la page -->
    <!-- Barre de navigation -->
    <nav>
        <ul class='navbar_l'>
            <li class='navbar_e'><a class='navbar_a' href="#">Boutique</a></li>
            <?php
            // si il est connecter en admin, affichage de "admin" et "logout"
            if (isset($_SESSION["cExyOXiDZBt"])) {
                ?><li class='navbar_e'><a class='navbar_a' href="admin/admin.php">Admin</a></li><?php
            }

            if (isset($_SESSION['user'])) {
                ?><li class='navbar_e'><a class='navbar_a' href="members/landing.php">Compte</a></li><?php
                ?><li class='navbar_e'><a class='navbar_a' href="members/deconnexion.php">Logout</a></li><?php
            }

            // si il n'est pas connecter, affichage de "login"
            else {
                ?><li class='navbar_e'><a class='navbar_a' href="members/index.php">Login</a></li><?php
            } ?>
        </ul>
    </nav>
    <!-- la présentation + logo -->
    <div class="about">
        <h2>Bienvenue chez Lucas Fashion</h2>
        <p>Nous sommes heureux de vous présenter notre nouvelle entreprise de vêtements et de mode. Nous avons créé Lucas Fashion dans le but de proposer des vêtements de qualité à des prix abordables, tout en mettant l'accent sur l'éthique et l'environnement. Nous croyons que la mode peut être durable et responsable, c'est pourquoi nous travaillons avec des matières premières écologiques et nous soutenons des projets sociaux et environnementaux.</p>
        <p>Nous espérons que vous apprécierez notre sélection de vêtements et que vous vous sentirez bien dans nos produits. N'hésitez pas à nous contacter si vous avez des questions ou des suggestions, nous serons ravis de vous aider !</p>
        <img src="annexe/cintre.png">
    </div>
    <!-- Affichage des produits en ligne -->
    <div class="container">
        <?php foreach ($Produits as $produit) : ?>
            <!-- si on clique sur l'encadre on est redirige pour voir les infos relatives au produit -->
            <a href="afficherproduit.php?idproduit=<?= $produit->id ?>">

                <div style="width: 500px; height:600px;position: relative;" class="product">
                    <img style="max-height:411px; max-width:300px; margin-bottom:200px" src="<?= $produit->image_produit ?>">
                    <div style="position: absolute; bottom:0; margin-bottom:30px">
                        <h3 style="color:#393d3fff;"><?= $produit->modele ?></h3>
                        <p>Taille : <?= $produit->taille ?></p>
                        <!-- taille du paragraphe max de 50 caracteres -->
                        <p><?= substr($produit->description_produit, 0, 50); ?>...</p>
                        <p style="font-size: large; font-weight:bold"><?= $produit->prix ?>€</p>
                    </div>
                </div>
            </a>
        <?php endforeach; ?>
    </div>
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