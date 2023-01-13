<?php session_start();?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <link href="../style.css" rel="stylesheet" type="text/css">
        <!-- Icone -->
        <link rel="shortcut icon" href="../annexe/favicon.ico" type="image/x-icon"/>
        <link rel="icon" href="../annexe/favicon.ico" type="image/x-icon"/>
        <title>Termes et Conditions</title>
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
                
                    // si il n'est pas connecter, affichage de "login"
                    if(!isset($_SESSION["cExyOXiDZBt"]))
                    {
                        ?><li class='navbar_e'><a class='navbar_a' href="../members/index.php">Login</a></li><?php
                    }
                ?>
            </ul>
        </nav>
        <!-- conditions de ventes -->
        <div class="about">
            <h2>Bienvenue chez Lucas Fashion</h2>
            
            <h3>Conditions générales de vente</h3>
            <p>Bienvenue sur notre site de vente en ligne de vêtements. En utilisant notre site, vous acceptez les présentes conditions générales de vente. Veuillez lire attentivement ces conditions avant d'utiliser notre site ou de passer une commande.</p>
            
            <h3>Prix et disponibilité</h3>
            <p>Les prix de nos produits sont indiqués en euros et sont valables sauf erreur typographique. Nous nous réservons le droit de modifier nos prix à tout moment, mais nous nous engageons à appliquer les tarifs en vigueur qui vous ont été indiqués au moment de votre commande.
                Nous faisons de notre mieux pour assurer que toutes les informations sur les produits, y compris les descriptions et les prix, sont exactes et à jour. Cependant, il se peut que des erreurs se produisent. Si nous découvrons une erreur dans le prix d'un produit que vous avez commandé, nous vous en informerons le plus rapidement possible et vous proposerons de reconfirmer votre commande au prix correct ou de l'annuler. Si nous ne parvenons pas à vous contacter, votre commande sera considérée comme annulée et vous serez remboursé si vous avez déjà payé pour le produit.
                Nous nous réservons le droit de limiter les quantités de produits que nous sommes prêts à vendre. Toutes les offres de produits sont valables tant qu'elles sont visibles sur le site et sont soumises à disponibilité.</p>
            <h3>Commandes</h3>
            <p>Pour passer une commande sur notre site, vous devez être âgé de 18 ans ou plus et disposer d'une adresse de livraison en France métropolitaine.
                Vous pouvez passer une commande en ajoutant les produits que vous souhaitez acheter à votre panier et en suivant les étapes du processus de commande. Nous vous demanderons de fournir certaines informations, notamment votre nom, votre adresse de livraison et votre adresse de facturation, ainsi que les détails de votre paiement.
                Vous pouvez annuler une commande jusqu'à ce qu'elle soit expédiée. Si votre commande a déjà été expédiée, vous devrez suivre notre procédure de retour.</p>
            
            <h3>Paiement</h3>
            <p>Nous acceptons les paiements par carte de crédit et par PayPal. Toutes les transactions sont sécurisées et vos informations de paiement sont cryptées avant d'être transmises.</p>
            
            <h3>Livraison</h3>
            <p>Nous livrons nos produits en France métropolitaine et en Belgique. Les frais de livraison varient en fonction du poids et de la destination de votre commande. Les frais de livraison seront calculés et affichés lorsque vous passerez votre commande.
                Nous faisons de notre mieux pour expédier les commandes dans les plus brefs délais, mais veuillez noter que nous ne pouvons être tenus responsables des retards causés par les services de livraison.</p>
            
            <h3>Retours et remboursements</h3>
            <p>Vous avez le droit de retourner tout produit acheté sur notre site dans les 14 jours suivant la réception de votre commande. Pour retourner un produit, veuillez nous contacter par e-mail et nous vous enverrons les instructions de retour.
                Les produits doivent être retournés dans leur état d'origine, non portés et non lavés, avec toutes les étiquettes et emballages d'origine. Nous nous réservons le droit de refuser les retours qui ne respectent pas ces conditions.
                Les frais de retour sont à votre charge. Nous vous rembourserons le prix du produit une fois que nous aurons reçu et vérifié l'état du produit retourné. Les frais de livraison ne sont pas remboursables.</p>
            
            <h3>Responsabilité</h3>
            <p>Nous ne serons pas responsables des dommages indirects causés par l'utilisation de nos produits. Cela inclut, sans s'y limiter, la perte de profits, la perte de clientèle et la perte de données.
                Nous nous efforçons de maintenir le site en ligne en permanence, mais nous ne sommes pas responsables des interruptions de service ou des erreurs.</p>
            
            <h3>Droits de propriété intellectuelle</h3>
            <p>Tous les contenus du site, y compris les textes, images, graphiques, logos, icônes et logiciels, sont la propriété de notre société ou de nos fournisseurs de contenu et sont protégés par les lois internationales sur le droit d'auteur.
                Vous pouvez imprimer et télécharger des extraits du contenu du site à des fins personnelles et non commerciales, mais vous ne pouvez pas utiliser ce contenu à d'autres fins sans notre autorisation écrite préalable.</p>
            
            <h3>Loi applicable et juridiction</h3>
            <p>Les présentes conditions générales de vente sont régies et interprétées conformément aux lois françaises. Tous les litiges découlant de ou liés à l'utilisation du site ou à ces conditions générales de vente seront soumis à la juridiction exclusive des tribunaux français.</p>
            <img src="../annexe/cintre.png">
        </div>
        <footer>
            <p>Copyright 2022 Lucas Fashion</p>
            <ul>
                <li><a href="#">Termes et conditions</a></li>
                <li><a href="privacy.php">Politique de confidentialité</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </footer>
    </body>
</html>