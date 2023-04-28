<?php
session_start();
require_once '../config/connexion.php';
require("../config/commandes.php");

// si la session existe pas on redirige
if (!isset($_SESSION['user'])) {
    header('Location:index.php');
    die();
}

// on recupere les donnees de l'utilisateur
$req = $bdd->prepare('SELECT * FROM utilisateurs WHERE token = ?');
$req->execute(array($_SESSION['user']));
$data = $req->fetch();

$Commandes = afficherCommandeId($data['id'])

?>
<!doctype html>
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
    <title>Votre compte</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Icone -->
    <link rel="shortcut icon" href="../annexe/favicon.ico" type="image/x-icon" />
    <link rel="icon" href="annexe/favicon.ico" type="image/x-icon" />
    <!-- style -->
    <link href="../style.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</head>

<body onload="scrollToPos()">
    <!-- Barre Navigation -->
    <nav>
        <ul class='navbar_l'>
            <li class='navbar_e'><a style="color: #fff;" class='navbar_a' href="../index.php">Boutique</a></li>
            <?php // si il est connecter en admin, affichage de "admin"
            if (isset($_SESSION["cExyOXiDZBt"])) {
                ?><li class='navbar_e'><a class='navbar_a' style="color: #fff;" href="../admin/admin.php">Admin</a></li><?php 
            }
            ?><li class='navbar_e'><a style="color: #fff;" class='navbar_a' href="#">Compte</a></li>
            <li class='navbar_e'><a style="color: #fff;" class='navbar_a' href="deconnexion.php">Logout</a></li>
        </ul>
    </nav>
    <br><br>
    <!-- affichage des informations de la personnes et de ses commandes en cours -->
    <div class="container">
        <div class="col-md-12">
            <div class="text-center">
                <br>
                <div style="margin:auto;width:900px;height:auto;" class="product">
                    <!-- informations relative au compte -->
                    <h1 style="color: #333;" class="p-5">Bonjour <?= substr($data['pseudo'], 0, 20) ?> !</h1>
                    <h2 style="color: #333;"> Vos informations : </h2><br>
                    <div style="color: #333;">
                        <p style="color: #333;">Pseudo : <?= $data['pseudo'] ?></p>
                        <p style="color: #333;">Email : <?= $data['email']; ?></p>
                        <p style="color: #333;">Adresse : <?= substr($data['adresse'], 0, 100) ?></p>
                        <p style="color: #333;">Date et heure d'inscription : <?= $data['date_inscription']; ?></p>
                    </div>
                    <hr />
                    <button type="button" class="btn btn-info"><a href="deconnexion.php" style="color: #fff;text-decoration:none">Déconnexion</a></button>
                    <br>
                </div>
                <br><br>
                <div style="display:block;margin:auto;width:900px;height:auto;" class="product">
                    <br><br>
                    <!-- commande de la personne -->
                    <h2 style="color: #333;"> Vos Commandes : </h2><br>
                    <div style="display:flex;margin:auto;width:900px;height:auto;" class="productc">
                        <?php $nbCommande = 0;
                        foreach ($Commandes as $commande) : ?>
                            <div style="width: 220px; height:auto; display:table;" class="info-commande">
                                <img style="max-height:250px; max-width:250px;" src="<?= afficherImageCommande($commande->id_produit); ?>">
                                <p>Produit : <?= afficherModele($commande->id_produit) ?></p>
                                <p>Taille : <?= afficherTaille($commande->id_produit) ?> </p>
                                <p>Quantité : <?= $commande->quantite ?></p>
                                <p>Prix total : <?= $commande->prix ?> €</p>
                                <p>Adresse de livraison : <?= afficherAdresse($commande->id_utilisateur) ?> </p>
                                <p>Date : <?= $commande->date_commande ?></p>
                                <a href="../config/commandes.php?action=supprimercommandeuser&parametre=<?= urlencode($commande->id_commande); ?>"><button style="vertical-align: bottom; border-radius:5px;">Annuler ma commande</button></a><br>
                            </div>
                        <?php $nbCommande = $nbCommande + 1;
                        endforeach;
                        if ($nbCommande == 0) {
                        ?><p style="font-weight: 700; font-size:larger; color:#333">Vous n'avez aucune commande en cours. <br><br><a href="../index.php"><button style="border-radius: 5px;">Acceder à la boutique</button></a></p><br><br><br><?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br><br>
    <footer>
        <p>Copyright 2022 Lucas Fashion</p>
        <ul>
            <li><a style="color: #fff;" href="../pages/terms.php">Termes et conditions</a></li>
            <li><a style="color: #fff;" href="../pages/privacy.php">Politique de confidentialité</a></li>
            <li><a style="color: #fff;" href="../pages/contact.php">Contact</a></li>
        </ul>
    </footer>
    <!-- style-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>