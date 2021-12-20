<?php
require('header.php');
$valid = true; // Variable pour vérifier si les champs sont vides
// Initialisation message erreur
$erreur_login = "";
$erreur_prenom = "";
$erreur_nom = "";
$erreur_login = "";
$erreur_mdp = "";
$erreur_mdp2 = "";
$modif = "";

var_dump($_POST);
//Vérifier si le formulaire a été validé
if (isset($_POST["submit"])){
    var_dump("ok1");
    // Variables du formulaire//
    $login = $_POST["login"];
    $firstname = $_POST["prenom"];
    $surname = $_POST["nom"];
    $password = $_POST["password"];
    $password2 = $_POST["password2"];
    //Vérifier si les champs sont remplis//
    if(isset($login, $firstname, $surname, $password)){
        if(empty($login)){ // Si le champs login est vide, un message est affiché //
            $valid = false; // La variable de vérification est false donc le formulaire ne peut être envoyé//
            $erreur_login = "Le champ 'login' est vide.";
          }
          // Création de la $select pour savoir si il y a un login de la bdd identique à un login taper par l'utilisateur
           $select = mysqli_query( $bdd, "SELECT * FROM utilisateurs WHERE login = '$login'");
           if(mysqli_num_rows($select)){
               $valid = false; //la vérif est fausse//
               echo "le login existe déjà.";
           }
           elseif(empty($firstname)) {
               $valid = false;
               $erreur_prenom = "Le champ 'prénom' est vide.";

           }
           elseif(empty($surname)){
               $valid = false;
               $erreur_nom = "Le champ 'nom'est vide.";
           }
           elseif(empty($password)){
               $valid = false;
               $erreur_mdp = "Le champ 'mot de passe' est vide.";
           }
           elseif($password != $password2){ //Si la confirmation du mot de passe n'est pas identique//
            $valid = false; // La vérif est fausse//
            $erreur_mdp2 = "La confirmation de mot de passe ne correspond pas.";
               }
            else{  ///Sinon on hache le mot de passe...//
                var_dump("ok");
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                //..et on insert les données de l'utilisateur dans la bdd.
                mysqli_query($bdd, "INSERT INTO utilisateurs(login, prenom, nom, password) VALUES ('$login', '$firstname', '$surname', '$hashed_password')");
                $valid = true;
                // Création d'une session une fois les données récupérées//
                $select = mysqli_query($bdd, "SELECT * FROM utilisateurs WHERE Login = '$login'");
                $resultat = mysqli_fetch_all($select, MYSQLI_ASSOC);
                header('Location: connexion.php');
            }
            }
            }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link  rel="stylesheet" type="text/css" href="module.css">
        <title>Inscription</title>
    </head>  

    <body class="bodyinscription">
        <header class="header_ins">
            <h1>Inscription</h1>
        </header>

        <main class="main_ins">
            <section class="boite_ins">
                <form class="form_ins" action="inscription.php" method="post">
                    <article class="pseudo_ins">
                        <label for="login">Votre pseudo :</label>
                        <input type="text" id="login" name="login" <?php echo $erreur_login;?>>
                    </article>
                    <article class="firstName_ins">
                        <label for="enterFirstName">Prénom :</label>
                        <input type="text" id="enterFirstName" name="prenom" <?php echo $erreur_prenom;?>>
                    </article>
                    <article class="lastName_ins">
                        <label for="enterLastName">Nom :</label>
                        <input type="text" id="enterLastName" name="nom" <?php echo $erreur_nom;?>>
                    </article>
                    <article class="mp_ins">
                        <label for="enterMp">Mot de passe : </label>
                        <input type="password" id="enterMp" name="password" <?php echo $erreur_mdp;?>>
                    </article>    
                    <article class="mp_ins">
                        <label for="confirmMp">Confirmez votre mot de passe :</label>
                        <input type="password" id="confirmMp" name="password2" <?php echo $erreur_mdp2;?>>

                    </article>  
                    <article class="button_ins">
                        <button type="submit" value="Submit"  name="submit">Valider</button><br/>
                        <a style="color:white; text-decoration:none;" class="boutton_nav" href="index.php">Retour accueil</a>
                        
                    </article>
                </form>
            </section>
        </main>
        <?php include('../pages/footer.php') ?>
        <footer class="footer_ins">
            
        </footer>
        
    
    </body>
</html>

