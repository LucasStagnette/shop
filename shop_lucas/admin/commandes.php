<?php

    session_start();
    require("../config/commandes.php");
    
    // on verifie que l'utilisateur est login en admin
    if(!isset($_SESSION["cExyOXiDZBt"]))
    {
        header('Location: ../members/index.php');
    }

    if(empty($_SESSION["cExyOXiDZBt"])) 
    {
        header('Location: ../members/index.php');
    }

    $Produits = afficher();
    $Commandes = afficherCommande();
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
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
        <!-- Icone --> 
        <link rel="shortcut icon" href="../annexe/favicon.ico" type="image/x-icon"/>
        <link rel="icon" href="../annexe/favicon.ico" type="image/x-icon"/>
        <!-- style -->
        <link href="../style.css" rel="stylesheet" type="text/css">
        <title>Admin Shop</title>
    </head>
    <body onload="scrollToPos()">
        <!-- Barre Navigation -->
        <nav>
            <ul class='navbar_l'>
                <li class='navbar_e'><a class='navbar_a' href="../index.php">Boutique</a></li>
                <li class='navbar_e'><a class='navbar_a' href="admin.php">Ajouter un produit</a></li>
                <li class='navbar_e'><a class='navbar_a' href="delete.php">Modifier un produit</a></li>
                <li class='navbar_e'><a style="color: #fff;" class='navbar_a' href="commandes.php">Commandes</a></li>
                <li class='navbar_e'><a style="color: #fff;" class='navbar_a' href="../members/landing.php">Compte</a></li>
                <li class='navbar_e'><a class='navbar_a' href="../members/deconnexion.php">Logout</a></li>
            </ul>
        </nav>
        <br>
        <div class="container">
            <!-- affichage de chaque produit -->
            
            <?php $nbCommande = 1;
                foreach($Commandes as $commande):?>
                <div style="margin-left: 30px;margin-right: 30px;width: 1000px; height:400px;position: relative;" class="product">
                
                    <img style="max-height:360px; max-width:380px;" src="<?= afficherImageCommande($commande->id_produit);?>">

                    <div class="info-commande">
                        <p style="font-size: 20px;">Commande N°<?= $nbCommande ?></p>
                        <p>Pour : <?= afficherPseudo($commande->id_utilisateur) ?></p>
                        <p>Produit : <?= afficherModele($commande->id_produit) ?></p>
                        <p>Taille : <?= afficherTaille($commande->id_produit) ?></p>
                        <p>Quantité : <?= $commande->quantite ?></p>
                        <p>Prix total : <?= $commande->prix ?> €</p>
                        <p>Adresse : <?= afficherAdresse($commande->id_utilisateur) ?></p>
                        <p>Date : <?= $commande->date_commande ?></p>
                        <a href="../config/commandes.php?action=supprimercommande&parametre=<?php echo urlencode($commande->id_commande); ?>"><button>Supprimer la commande</button></a>

                    </div>

                </div>
            <?php $nbCommande = $nbCommande +1;
                endforeach; ?>
        </div>
        <?php 
            if($nbCommande==1)
            {?>
                <h2 style="text-align:center;margin-top:300px; color:#fff; font-weight:700; text-decoration:underline">Aucune commande en cours</h2><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                        <footer>
                        <p>Copyright 2022 Lucas Fashion</p>
                        <ul>
                            <li><a href="../pages/terms.php">Termes et conditions</a></li>
                            <li><a href="../pages/privacy.php">Politique de confidentialité</a></li>
                            <li><a href="../pages/contact.php">Contact</a></li>
                        </ul>
                    </footer><?php
            }
            else
            {    ?>
        <footer>
            <p>Copyright 2022 Lucas Fashion</p>
            <ul>
                <li><a href="../pages/terms.php">Termes et conditions</a></li>
                <li><a href="../pages/privacy.php">Politique de confidentialité</a></li>
                <li><a href="../pages/contact.php">Contact</a></li>
            </ul>
        </footer><?php } ?>
    </body>
</html>