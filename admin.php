<?php
require ('header.php');
// Requête pour récupérer les infos sur les utilisateurs//
$requete = mysqli_query ($bdd, "SELECT 'Id','Login', 'Prenom', 'Nom' FROM utilisateurs");
// Resultat de la requête//
$resultat = mysqli_fetch_all($requete, MYSQLI_ASSOC); ?>
<main class="main-admin">
<!-- Permet d'afficher le nom de l'utilisateur connecté.-->
<?php if(isset($_SESSION['prenom'])) { ?> <p class="user-connecte"> Bonjour
<?php echo $_SESSION['prenom']; ?>,vous êtes connecté.</p> <?php  }  ?>

        <h1> Administration </h1>
        <table   class="tableau-admin">
              <thead>
                  <tr>
                      <?php
                      foreach ($resultat as $key => $value)  {
                          foreach($value as $key2 => $value2){
                              echo "<th>".$key2."</th>";
                          }
                          break;
                      } ?>
                         </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($resultat as $key => $value)   {
                        echo "<tr>";
                        foreach($value as $key2 => $value2)  {
                            echo "<td>".$value2."</td>";
                        }
                            echo "</tr>";
                    } ?>
                      </tbody>
                </table>
                </main> 
                <?php include('footer.php') ?>
                </body>
                </html>
  