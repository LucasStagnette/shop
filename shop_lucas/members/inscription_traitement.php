<?php
require_once '../config/connexion.php';

// on verifie que les variables ne sont pas vides
if (!empty($_POST['pseudo']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password_retype']) && !empty($_POST['adresse'])) {
    // on met les mets dans des variables
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $email = htmlspecialchars($_POST['email']);
    $adresse = htmlspecialchars($_POST['adresse']);
    $password = htmlspecialchars($_POST['password']);
    $password_retype = htmlspecialchars($_POST['password_retype']);

    // on verifie si l'utilisateur est deja existant
    $check = $bdd->prepare('SELECT pseudo, email, password FROM utilisateurs WHERE email = ?');
    $check->execute(array($email));
    $data = $check->fetch();
    $row = $check->rowCount();

    // on met l'email tout en minuscule
    $email = strtolower($email);

    // si row== 0 l'utilisateur n'est pas inscrit 
    if ($row == 0) {

        // on verifie que la longueur du pseudo est inferieur ou egal 100
        if (strlen($pseudo) <= 100) {

            // on verifie que la longueur de l'email est inferieur ou egal 100
            if (strlen($email) <= 100) {

                // on verifie si l'email est de la bonne forme
                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

                    // on verifie si les deux mdp saisis sont bon
                    if ($password === $password_retype) {

                        // on hach le mot de passe
                        $cost = ['cost' => 12];
                        $password = password_hash($password, PASSWORD_BCRYPT, $cost);

                        // on sauvegarde l'addresse IP
                        $ip = $_SERVER['REMOTE_ADDR'];

                        // on les mets dans la base
                        $insert = $bdd->prepare('INSERT INTO utilisateurs(pseudo, email, adresse, password, ip, token) VALUES(:pseudo, :email, :adresse, :password, :ip, :token)');
                        $insert->execute(array(
                            'pseudo' => $pseudo,
                            'email' => $email,
                            'adresse' => $adresse,
                            'password' => $password,
                            'ip' => $ip,
                            // on genere un token aleatoire
                            'token' => bin2hex(openssl_random_pseudo_bytes(64))
                        ));
                        // on redirige l'utilisateur avec le message succes
                        header('Location:index.php?login_err=success');
                        die();
                    } else {
                        header('Location: inscription.php?reg_err=password');
                        die();
                    }
                } else {
                    header('Location: inscription.php?reg_err=email');
                    die();
                }
            } else {
                header('Location: inscription.php?reg_err=email_length');
                die();
            }
        } else {
            header('Location: inscription.php?reg_err=pseudo_length');
            die();
        }
    } else {
        header('Location: inscription.php?reg_err=already');
        die();
    }
}
