<?php session_start();?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <link href="../style.css" rel="stylesheet" type="text/css">
        <!-- Icone -->
        <link rel="shortcut icon" href="../annexe/favicon.ico" type="image/x-icon"/>
        <link rel="icon" href="../annexe/favicon.ico" type="image/x-icon"/>
        <title>Politique de confidentialité</title>
    </head>
    <body>
        <!-- Barre de navigation -->
        <nav>
            <ul class='navbar_l'>
                <li class='navbar_e'><a class='navbar_a' href="../index.php">Boutique</a></li>
                <?php
                    // si il est connecter en admin, affichage de "admin" et "logout"
                    if(isset($_SESSION["cExyOXiDZBt"]))
                    {
                        ?><li class='navbar_e'><a class='navbar_a' href="../admin/admin.php">Admin</a></li><?php
                    }

                    if(isset($_SESSION["user"]))
                    {
                        ?><li class='navbar_e'><a class='navbar_a' href="../members/deconnexion.php">Logout</a></li><?php
                    }
                
                    // si il n'est pas connecter en admin, affichage de "login"
                    if(!isset($_SESSION["cExyOXiDZBt"]))
                    {
                        ?><li class='navbar_e'><a class='navbar_a' href="../login.php">Login</a></li><?php
                    }
                ?>
            </ul>
        </nav>
        <div class="about">
            <h2>Bienvenue chez Lucas Fashion</h2>
            <h3>Politique de confidentialité</h3>
            <p>Nous respectons votre vie privée et nous nous engageons à protéger les informations personnelles que vous nous fournissez. Cette politique de confidentialité explique comment nous collectons, utilisons et partageons vos informations personnelles lorsque vous utilisez notre site de vente en ligne de vêtements.</p>

            <h3>Informations que nous collectons</h3>
            <p>Nous collectons les informations suivantes lorsque vous utilisez notre site :
                <br>Informations que vous nous fournissez volontairement, comme votre nom, votre adresse e-mail, votre adresse de livraison et de facturation, et les détails de votre paiement lorsque vous passez une commande.
                <br>Informations sur votre utilisation de notre site, comme les produits que vous achetez et les pages que vous visitez.
                <br>Informations sur votre ordinateur ou votre appareil mobile, comme votre adresse IP, votre navigateur et votre système d'exploitation.</p>
            <h3>Comment nous utilisons vos informations</h3>
            <p>Nous utilisons les informations que nous collectons pour :
                <br>Traiter et expédier vos commandes.
                <br>Vous envoyer des e-mails de confirmation de commande et de livraison.
                <br>Vous tenir informé des mises à jour de notre site et de nos offres spéciales. Si vous ne souhaitez pas recevoir ces e-mails, vous pouvez vous désinscrire en suivant les instructions de désinscription incluses dans chaque e-mail.
                <br>Améliorer notre site et nos produits en analysant vos préférences et vos habitudes de consommation.</p>
            <h3>Comment nous partageons vos informations</h3>
            <p>Nous ne partageons pas vos informations personnelles avec des tiers à des fins de marketing sans votre consentement. Nous pouvons cependant partager vos informations dans les cas suivants :
                <br>Avec nos prestataires de services qui nous aident à gérer notre site et à traiter vos commandes, tels que nos fournisseurs de paiement et nos transporteurs.
                <br>Si nous sommes tenus de le faire par la loi ou si nous croyons de bonne foi que cela est nécessaire pour protéger nos droits ou ceux de tiers.</p>
            <h3>Cookies et suivi</h3>
            <p>Nous utilisons des cookies et des technologies de suivi pour améliorer votre expérience sur notre site et pour nous aider à comprendre comment nos clients utilisent notre site. Les cookies sont de petits fichiers de données qui sont stockés sur votre ordinateur ou votre appareil mobile lorsque vous visitez un site. Ils nous permettent de suivre votre navigation sur notre site et de cibler les publicités qui pourraient vous intéresser. Vous pouvez configurer votre navigateur pour refuser les cookies, mais cela peut affecter votre expérience sur notre site</p>
            <img src="../annexe/cintre.png">
        </div>
        <footer>
            <p>Copyright 2022 Lucas Fashion</p>
            <ul>
                <li><a href="terms.php">Termes et conditions</a></li>
                <li><a href="#">Politique de confidentialité</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </footer>
    </body>
</html>