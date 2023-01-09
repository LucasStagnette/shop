<?php

    session_start();
    include "config/commandes.php";

?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Login Shop</title>
        <!-- style -->
        <link href="style.css" rel="stylesheet" type="text/css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    </head>
    <body>
        <!-- Barre de navigation -->
        <nav>
            <ul class='navbar_l'>
                <li class='navbar_e'><a style="color: #fff;" class='navbar_a' href="index.php">Boutique</a></li>
                <li class='navbar_e'><a style="color: #fff;" class='navbar_a' href="#">Login</a></li>
            </ul>
        </nav>
        <br><br><br><br><br><br><br><br>
        <!-- Login form -->
        <form class="login" method="post">

            <div class="mb-3">
                <label for="pseudo" class="form-label">Utilisateur*</label>
                <input type="text" class="form-control" placeholder="Administrator only" name="pseudo">
            </div>

            <div class="mb-3">
                <label for="motdepasse" class="form-label">Mot de passe*</label>
                <input type="password" class="form-control" placeholder="Mot de passe" name="motdepasse">
            </div>
            <!-- bouton se connecter -->
            <input type="submit" class="btn btn-primary" value="Se connecter" name="envoyer">
        </form>
    </body>
</html>
<?php
    // si l'utilisateur a cliquer sur le bouton se connecter
    if(isset($_POST["envoyer"])) {

        // on verifie que les champs soient remplis
        if(!empty($_POST["pseudo"]) AND !empty($_POST["motdepasse"])) {

            // on met le pseudo et le mdp dans les variables
            $pseudo = htmlspecialchars(strip_tags($_POST["pseudo"]));
            $motdepasse = htmlspecialchars(strip_tags($_POST["motdepasse"]));

            $admin = getAdmin($pseudo, $motdepasse);

            // on se connecte en administrateur et on est redirige vers la 1 ere page admin
            if($admin) {
                $_SESSION['cExyOXiDZBt'] = $admin;
                header("Location: admin/admin.php");
            }
            else {
                echo "probleme de connexion";
            }
        }
    }

?>