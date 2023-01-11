<!DOCTYPE html>
    <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <!-- Icone --> 
            <link rel="shortcut icon" href="../annexe/favicon.ico" type="image/x-icon"/>
            <link rel="icon" href="annexe/favicon.ico" type="image/x-icon"/>
            <link href="../style.css" rel="stylesheet" type="text/css">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
            <title>Inscription</title>
        </head>
        <body>
        <!-- Barre Navigation -->
        <nav>
            <ul class='navbar_l'>
                <li class='navbar_e'><a style="color: #fff;" class='navbar_a' href="../index.php">Boutique</a></li>
                <li class='navbar_e'><a style="color: #fff;" class='navbar_a' href="index.php">Login</a></li>
            </ul>
        </nav>
        <div class="login-form">
            <?php 
                if(isset($_GET['reg_err']))
                {
                    $erreur = htmlspecialchars($_GET['reg_err']);

                    switch($erreur)
                    {
                        case 'success':
                        ?>
                            <div class="alert alert-success">
                                <strong>Succès</strong> : inscription réussie !
                            </div>
                        <?php
                        break;

                        case 'password':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> : mot de passe différent
                            </div>
                        <?php
                        break;

                        case 'email':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> : email non valide
                            </div>
                        <?php
                        break;

                        case 'email_length':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> : email trop long
                            </div>
                        <?php 
                        break;

                        case 'pseudo_length':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> : pseudo trop long
                            </div>
                        <?php 
                        case 'already':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> : compte deja existant
                            </div>
                        <?php 

                    }
                }
                ?>
            <br><br><br><br><br><br>
            <form class="login" action="inscription_traitement.php" method="post">
                <h2 class="text-center">Inscription</h2>  
                <br>     
                <div class="form-group">
                    <input type="text" name="pseudo" class="form-control" placeholder="Pseudo" required="required" autocomplete="off">
                </div>
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
                    <input type="password" name="password_retype" class="form-control" placeholder="Re-tapez le mot de passe" required="required" autocomplete="off">
                </div>
                <br>
                <p>En vous inscrivant vous acceptez notre <a style="color: #333;" href="../pages/privacy.php" target="_blank">politique de confidentialité[↗️]</a> et nos <a style="color: #333;" target="_blank" href="../pages/terms.php"> termes et conditions[↗️]</a></p>
                <div class="form-group">
                    <center><button type="submit" id="boutton_login" class="btn btn-primary">Inscription</button></center>
                </div>   
                <br>
                <p class="text-center"><a style="color: #333;" href="index.php">Vous avez déjà un compte ? Connexion</a></p>
            </form>
        </div>
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