<?php session_start();?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <link href="../style.css" rel="stylesheet" type="text/css">
        <!-- Icone -->
        <link rel="shortcut icon" href="../annexe/favicon.ico" type="image/x-icon"/>
        <link rel="icon" href="../annexe/favicon.ico" type="image/x-icon"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
        <title>Contact</title>
    </head>
    <body>
        <!-- Barre de navigation -->
        <nav>
            <ul class='navbar_l'>
                <li class='navbar_e'><a style="color: #fff;" class='navbar_a' href="../index.php">Boutique</a></li>
                <?php
                    // si il est connecter en admin, affichage de "admin" et "logout"
                    if(isset($_SESSION["lucasstagnette"]))
                    {
                        ?><li class='navbar_e'><a style="color: #fff;" class='navbar_a' href="../admin/admin.php">Admin</a></li><?php
                    }

                    if(isset($_SESSION["cExyOXiDZBt"]))
                    {
                        ?><li class='navbar_e'><a style="color: #fff;" class='navbar_a' href="../members/deconnexion.php">Logout</a></li><?php
                    }
                
                    // si il n'est pas connecter en admin, affichage de "login"
                    if(!isset($_SESSION["cExyOXiDZBt"]))
                    {
                        ?><li class='navbar_e'><a style="color: #fff;" class='navbar_a' href="../login.php">Login</a></li><?php
                    }
                ?>
            </ul>
        </nav>
        <br><br>
        <!-- Formulaire pour envoyer un email -->
        <form class="login" action="" method="post">

            <div class="form-group">            
                <label for="nom">Nom :</label><br>
                <input class="form-control" type="text" id="nom" name="nom"><br>
            </div>

            <div class="form-group">
                <label for="email">Email :</label><br>
                <input class="form-control" type="email" id="email" name="email"><br>
            </div>

            <div class="form-group">
                <label for="sujet">Sujet :</label><br>
                <input class="form-control" type="text" id="sujet" name="sujet"><br>
            </div>

            <div class="form-group">
                <label for="message">Message :</label><br>
                <textarea class="form-control" id="message" name="message"></textarea><br>
            </div>
            <input type="submit" name="valider" value="Envoyer">
        </form>
        <!-- footer -->
        <footer>
            <p>Copyright 2022 Lucas Fashion</p>
            <ul>
                <li><a style="color: #fff;" href="terms.php">Termes et conditions</a></li>
                <li><a style="color: #fff;" href="#">Politique de confidentialité</a></li>
                <li><a style="color: #fff;" href="contact.php">Contact</a></li>
            </ul>
        </footer>
    </body>
</html>
<?php
// l'utilisateur a appuyer sur envoyer
if(isset($_POST['valider'])){
    // si les informations sont remplis et non vide
    if(isset($_POST['nom']) && isset($_POST['email']) && isset($_POST['sujet']) && isset($_POST['message'])) {

        if(!empty($_POST['nom']) AND !empty($_POST['email']) AND !empty($_POST['sujet']) AND !empty($_POST['message'])) {

            // on prend les valeurs du formulaire que l'on met dans ces variables
            $nom = $_POST['nom'];
            $email = $_POST['email'];
            $sujet = $_POST['sujet'];
            $message = $_POST['message'];

            // configurations des informations pour l'envoi du mail
            $to = "lucasgrosliere@outlook.fr";
            $subject = "Nouveau message de contact : $sujet";
            $headers = "From: $nom <$email>\r\n";
            $headers .= "Reply-To: $email\r\n";

            // on envoit l'email et on verifie qu'il a bien ete envoye
            if(mail($to, $subject, $message, $headers)) {
                echo "Le message a été envoyé avec succès.";
            } 
            else {
                echo "Une erreur est survenue lors de l'envoi du message.";
            }
        }
    }
}
?>