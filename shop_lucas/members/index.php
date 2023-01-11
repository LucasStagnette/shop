<!DOCTYPE html>
    <html lang="fr">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <!-- Icone --> 
            <link rel="shortcut icon" href="../annexe/favicon.ico" type="image/x-icon"/>
            <link rel="icon" href="annexe/favicon.ico" type="image/x-icon"/>
            <link href="../style.css" rel="stylesheet" type="text/css">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
            <title>Connexion</title>
        </head>
        <body>
        <!-- Barre Navigation -->
        <nav>
            <ul class='navbar_l'>
                <li class='navbar_e'><a style="color: #fff;" class='navbar_a' href="../index.php">Boutique</a></li>
                <li class='navbar_e'><a style="color: #fff;" class='navbar_a' href="#">Login</a></li>
            </ul>
        </nav>
        <div class="login-form">
             <?php 
                if(isset($_GET['login_err']))
                {
                    $erreur = htmlspecialchars($_GET['login_err']);

                    switch($erreur)
                    {
                        case 'password':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> : mot de passe incorrect
                            </div>
                        <?php
                        break;

                        case 'email':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> : email incorrect
                            </div>
                        <?php
                        break;

                        case 'already':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> : compte non existant
                            </div>
                        <?php
                        break;
                    }
                }
                ?> 
            <br><br><br><br><br><br><br><br>
            <form class="login" action="connexion.php" method="post">
                <h2 class="text-center">Connexion</h2> 
                <br>      
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Email" required="required" autocomplete="off">
                </div>
                <br>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Mot de passe" required="required" autocomplete="off">
                </div>
                <br>
                <div class="form-group">
                    <center><button type="submit" id="boutton_login" class="btn btn-primary">Connexion</button></center>
                </div> 
                <br>
                <p class="text-center"><a style="color: #333;" href="inscription.php">Vous n'avez pas de compte ? Inscription</a></p>  
            </form>
            <br><br><br><br><br><br><br>
        </div>
        <footer>
            <p>Copyright 2022 Lucas Fashion</p>
            <ul>
                <li><a style="color: #fff;" href="../pages/terms.php">Termes et conditions</a></li>
                <li><a style="color: #fff;" href="../pages/privacy.php">Politique de confidentialité</a></li>
                <li><a style="color: #fff;" href="../pages/contact.php">Contact</a></li>
            </ul>
        </footer>
<style>
#boutton_login {
   background-color: #333;
   color: #fff;
   font-size: 16px;
   font-weight: bold;
   padding: 10px 20px;
   border: none;
   cursor: pointer;
   transition: all 0.2s;  
}
</style>
        </body>
</html>