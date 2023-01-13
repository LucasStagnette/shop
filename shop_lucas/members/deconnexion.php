<?php
session_start();

// on détruit la session
session_destroy();

// on le redirige vers la page login
header('Location:../index.php');
die();
