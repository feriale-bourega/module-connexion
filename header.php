
<?php
// Initialiser ma session
session_start();
// Inclure le footer
require ('fonctions.php');
// SE CONNECTER A LA BASE DE DONNEE
$bdd = mysqli_connect("localhost","feriale-bourega","ferbou","feriale-bourega_moduleconnexion");
if(isset($_POST["deconnect"])) {
    unset($_SESSION["id"]);
    unset($_SESSION['prenom']);
    unset($_SESSION['login']);
    // header('refresh:0');
    header('Location: accueil.php');
}
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Bienvenue sur sweet</title>
        
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Mono:wght@300&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Crafty+Girls&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Puppies+Play&display=swap" rel="stylesheet">
        <link type=text/css href="module.css" rel="stylesheet">
    </head>
    <body >
        <header >
            <nav>
                <?php if(nestpasconnect()) { ?>
                <a  href="index.php">Accueil</a>
                <a  href="inscription.php">Inscription</a>
                <a  href="connexion.php">Connexion</a>
                <?php } 

                if(estconnect()) { ?>
                <a  href="index.php">Accueil</a>
                <a   href="profil.php">Profil</a>
                <?php }?>  

                <?php if (estadmin()) { ?>
                <a  href="admin.php">Administration</a>
                <?php } ?>    
            </nav>
            <?php if(isset($_SESSION['prenom'])) { ?> 
                <form action="#" method="post">
                    <input type="submit" id="deconnect" name="deconnect" value="D??connexion">
                </form> <?php } ?>
        </header>  