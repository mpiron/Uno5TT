<!-- index.php -->
<!-- inclusion des variables et fonctions -->
<?php
  session_start(); //donne acces à la supervariable $_SESSION qui persiste entre 2 requêtes PHP
  include('variables.php');     
  include_once('functions_etape6.php'); 
  
  if (isset($_POST['click']))
    {
        if ($_POST['click']=="j1")
        {   piocher('j1');  
            }
    if ($_POST['click']=="j2")
        {   piocher('j2');
            }
        }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Jeu UNO - Etape6</title>
        <link rel="stylesheet" href="style.css">
        <link rel="shortcut icon" type="image/jpg" href="cartes/uno.png" />
    </head>
    <body>
        <!-- inclusion de l'entête du site -->
        <?php include_once('header.php'); ?>
        <div id="container">
            <h1>Etape 6 <br> Utilisation des fonctions pour piocher des cartes</h1>
            les étapes:
            <ol>
                <li>Le deck mélangé : $deckDepart <?php taille($deckDepart);?>  </li>


                <?php foreach($deckDepart as $carte) : ?>
                <img class="cartept" src="cartes/<?php echo $carte['image']; ?>" alt="<?php echo $carte['nom']; ?>">
                <?php endforeach ?>


                <li>Affichage des deux mains </li>

                <ul>
                    <li>Main joueur 1 = $_SESSION['mainJoueur1']  <?php taille($_SESSION['mainJoueur1']);?> </li>
                    <?php  afficherCartes($_SESSION['mainJoueur1'],'gd') ?>
                    <li>Main joueur 2 = $_SESSION['mainJoueur2'] <?php taille($_SESSION['mainJoueur2']);?> </li>
                    <?php  afficherCartes($_SESSION['mainJoueur2'],'gd') ?>
                      <li>Défausse = $defausse</li>
                <?php foreach($defausse as $carte) : ?>
                <img class="cartegd" src="cartes/<?php echo $carte['image']; ?>" alt="<?php echo $carte['nom']; ?>">
                <?php endforeach ?>
                </ul>
                <li>Pioche restante = $_SESSION['pioche']  <?php taille($_SESSION['pioche']);?></li>
                <?php  afficherCartes($_SESSION['pioche'],'pt') ?>
             
            </ol>
           

            <form action="etape6.php" method="post">
                  <input type="hidden" name="click" value="j1" />
                  <button type="submit">Joueur1: piocher des cartes</button>
            </form>
            <form action="etape6.php" method="post">
                <input type="hidden" name="click" value="j2" />
                <button type="submit">Joueur2: piocher des cartes</button>
            </form>
                         <form action="etape7.php" method="post">
                <button type="submit">Aller à l'étape 7: Jouer une cartes</button>
            </form>

            Aide à l'étape ( <a target="_blank"
                href="https://openclassrooms.com/fr/courses/918836-concevez-votre-site-web-avec-php-et-mysql/4239476-conservez-des-donnees-grace-aux-sessions-et-aux-cookies">gérer
                les sessions</a>
            )
  
        </div>
        <!-- inclusion du bas de page du site -->
        <?php include_once('footer.php'); ?>

    </body>

</html>
<!-- Lien peut-être utile https://openclassrooms.com/forum/sujet/transmettre-un-array-via-formulaire-89193 -->