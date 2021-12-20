<?php
if (isset($_POST["regsubmit"])) {
    if ($_POST["password"] == $_POST["passwordconfirm"]) {
        $connect = mysqli_connect("localhost", "root", "", "moduleconnexion");
        $request = "SELECT * FROM `utilisateurs`";
        $query = mysqli_query($connect, $request);
        $result = mysqli_fetch_all($query);
        $connectstate = true;        
        $i = 0;
        while ($i < count($result)) {
            if ($result[$i][1] == $_POST["login"]) {
                $connectstate = false;
                header("location:inscription.php");
                break;
            }
            ++$i;
        }
        if ($connectstate == true) {
            $login = $_POST['login'];
            $name = $_POST['prenom'];
            $firstname = $_POST['nom'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $request = "INSERT INTO utilisateurs (`login`, `prenom`, `nom`, `password`) VALUES ('$login', '$name', '$firstname', '$password')";
            var_dump(mysqli_query($connect, $request)); 
            header("location:connexion.php");
        }

    }
}
?>
<!doctype html>
<html lang="fr">
        <head>
           <meta charset="utf-8">
            <link rel="stylesheet" href="index.css" media="screen" type="text/css" />
        </head>
        <body>
            <div id="container">
            
                    <form action="inscription.php" method="POST">
                    <h1>Inscription</h1>
                    <label><b>Login</b></label>
                    <input type="text" placeholder="Entrer le nom d'utilisateur" name="login" required>

                    <label><b>Nom</b></label>
                    <input type="text" placeholder="Entrer le Nom" name="nom" required>

                    <label><b>Prénom</b></label>
                    <input type="text" placeholder="Entrer le Prénom" name="prenom" required>
                        
                    <label><b>Password</b></label>
                    <input type="password" placeholder="Entrer le mot de passe" name="password" required>

                    <label><b>Confirmation du Password</b></label>
                    <input type="password" placeholder="Confirmer le mot de passe" name="passwordconfirm" required>

                    <input type="submit" id='submit' name='regsubmit' value='Inscription' >
                    </form>
            </div>
            </body>
</html>

