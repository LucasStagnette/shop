<?php 
    session_start();
    require_once '../config/connexion.php';  

   // si la session existe pas on redirige
    if(!isset($_SESSION['user'])){
        header('Location:index.php');
        die();
    }

    // On récupere les données de l'utilisateur
    $req = $bdd->prepare('SELECT * FROM utilisateurs WHERE token = ?');
    $req->execute(array($_SESSION['user']));
    $data = $req->fetch();
   
?>
<!doctype html>
<html lang="fr">
    <head>
        <title>Espace membre</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Icone --> 
        <link rel="shortcut icon" href="../annexe/favicon.ico" type="image/x-icon"/>
        <link rel="icon" href="annexe/favicon.ico" type="image/x-icon"/>
        <link href="../style.css" rel="stylesheet" type="text/css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    </head>
    <body>
        <!-- Barre Navigation -->
        <nav>
            <ul class='navbar_l'>
                <li class='navbar_e'><a style="color: #fff;" class='navbar_a' href="../index.php">Boutique</a></li><?php
                // si il est connecter en admin, affichage de "admin"
                    if(isset($_SESSION["cExyOXiDZBt"]))
                    {
                        ?><li class='navbar_e'><a class='navbar_a' style="color: #fff;" href="../admin/admin.php">Admin</a></li><?php
                    }
?>              <li class='navbar_e'><a style="color: #fff;" class='navbar_a' href="#">Compte</a></li>
                <li class='navbar_e'><a style="color: #fff;" class='navbar_a' href="deconnexion.php">Logout</a></li>
            </ul>
        </nav>
        <br><br>
        <div class="container">
            <div class="col-md-12">
                <?php 
                        if(isset($_GET['err'])){
                            $err = htmlspecialchars($_GET['err']);
                            switch($err){
                                case 'current_password':
                                    echo "<div class='alert alert-danger'>Le mot de passe actuel est incorrect</div>";
                                break;

                                case 'success_password':
                                    echo "<div class='alert alert-success'>Le mot de passe a bien été modifié ! </div>";
                                break; 
                            }
                        }
                    ?>


                <div class="text-center">
                    <br>
                    <div style="margin:auto;width:900px;height:auto;" class="product">
                        <h1 style="color: #333;" class="p-5">Bonjour <?php echo $data['pseudo']; ?> !</h1>
                        <h2 style="color: #333;" > Vos informations : </h2><br>
                        <div style="color: #333;">
                            <p style="color: #333;" >Pseudo : <?php echo $data['pseudo']; ?></p>
                            <p style="color: #333;">Email :  <?php echo $data['email']; ?></p>
                            <p style="color: #333;">Adresse :  <?php echo $data['adresse']; ?></p>
                            <p style="color: #333;">Date et heure d'inscription : <?php echo $data['date_inscription']; ?></p>
                        </div>
                        <hr/>
                        <button type="button" class="btn btn-info"><a  href="deconnexion.php" style="color: #fff;text-decoration:none">Déconnexion</a></button>
                        <br>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#change_password">Changer mon mot de passe</button>
                        <br>
                    </div>
                </div>
            </div>
        </div>                        
        <!-- Modal -->
        <div class="modal fade" id="change_password" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Changer mon mot de passe</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                         </div>
                            <div class="modal-body">
                                <form action="layouts/change_password.php" method="POST">
                                    <label for='current_password'>Mot de passe actuel</label>
                                    <input type="password" id="current_password" name="current_password" class="form-control" required/>
                                    <br />
                                    <label for='new_password'>Nouveau mot de passe</label>
                                    <input type="password" id="new_password" name="new_password" class="form-control" required/>
                                    <br />
                                    <label for='new_password_retype'>Re tapez le nouveau mot de passe</label>
                                    <input type="password" id="new_password_retype" name="new_password_retype" class="form-control" required/>
                                    <br />
                                    <button type="submit" class="btn btn-success">Sauvegarder</button>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="modal fade" id="avatar" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Changer mon avatar</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                        <div class="modal-body">
                            <form action="layouts/change_avatar.php" method="POST" enctype="multipart/form-data">
                                <label for="avatar">Images autorisées : png, jpg, jpeg, gif - max 20Mo</label>
                                <input type="file" name="avatar_file">
                                <br />
                                <button type="submit" class="btn btn-success">Modifier</button>
                            </form>
                        </div>
                        <br />
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
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