<?php 
    session_start(); 
    require_once '../config/connexion.php'; 

    // si les champs ne sont pas vides
    if(!empty($_POST['email']) && !empty($_POST['password'])) 
    {
        // on met les donnes dans les variables + specialchars pour eviter les failles
        $email = htmlspecialchars($_POST['email']); 
        $password = htmlspecialchars($_POST['password']);
        
        // on transforme l'email en minuscule
        $email = strtolower($email); 
        
        // on regarde si il est deja inscrit dans la base de donne
        $check = $bdd->prepare('SELECT pseudo, email, password, token FROM utilisateurs WHERE email = ?');
        $check->execute(array($email));
        $data = $check->fetch();
        $row = $check->rowCount();
        
        

        // on verifie si $row >0 -> il est deja inscrit sinon il n'est pas inscrit
        if($row > 0)
        {
            // on verifie si l'email est au bon format
            if(filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                // on verifie si le mot de passe correspond
                if(password_verify($password, $data['password']))
                {
                    if($email == "lucasgrosliere@outlook.fr"){
                        $_SESSION['cExyOXiDZBt'] = $data;
                    }
                    // on cree la session puis on redirige l'utilisateur sur la page de l'espace client
                    $_SESSION['user'] = $data['token'];
                    header('Location: ../index.php');
                    die();

                }
                else
                { 
                    header('Location: index.php?login_err=password'); die(); 
                }

            }
            else
            { 
                header('Location: index.php?login_err=email'); die(); 
            }

        }
        else
        { 
            header('Location: index.php?login_err=already'); die(); 
        }

    // si le formulaire est envoyé sans donnés on redirige sur la page de login
    }
    else
    { 
        header('Location: index.php'); die();
    }