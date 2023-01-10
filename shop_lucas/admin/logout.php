<!-- Supprime la session pour se deconnecter -->
<?php
session_start();

// supprime la session et redirige vers l'accueil 
if(isset($_SESSION['cExyOXiDZBt']))
{
    session_destroy();

    header('Location: ../index.php');
}
// ou la page login si l'utilisateur a rentre cette url directement dans son navigateur
else 
{
    session_destroy();

    header("Location: ../login.php");
}
?>