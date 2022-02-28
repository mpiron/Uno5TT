<!-- index.php -->
<!-- inclusion des variables et fonctions -->
<?php
  session_start(); //donne acces à la supervariable $_SESSION qui persiste entre 2 requêtes PHP
  include_once('variables.php');   
  /*    
grâce au fichier variables, 
$deckDepart=$_SESSION['deckDepart']
$pioche=$_SESSION['pioche'] ; 
$mainJoueur1=$_SESSION['mainJoueur1'] et $mainJoueur2=$_SESSION['mainJoueur2']*/
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jeu UNO - Etape5</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" type="image/jpg" href="cartes/uno.png" />
</head>

<body>

    <!-- inclusion de l'entête du site -->
    <?php include_once('header.php'); ?>
    <div id="container">
        <h1>Etape 5 récupération des variables de session!</h1>
        les étapes:
        <ol>
            <li>Le deck mélangé : $deckDepart</li>


            <?php foreach($deckDepart as $carte) : ?>
            <img class="cartept" src="cartes/<?php echo $carte['image']; ?>" alt="<?php echo $carte['nom']; ?>">
            <?php endforeach ?>


            <li>Affichage des deux mains </li>

            <ul>
                <li>Main joueur 1 = $mainJoueur1</li>
                <?php foreach($mainJoueur1 as $carte) : ?>
                <img class="cartegd" src="cartes/<?php echo $carte['image']; ?>" alt="<?php echo $carte['nom']; ?>">
                <?php endforeach ?>
             <li>Main joueur 2= $mainJoueur2</li>
                <?php foreach($mainJoueur2 as $carte) : ?>
                <img class="cartegd" src="cartes/<?php echo $carte['image']; ?>" alt="<?php echo $carte['nom']; ?>">
                <?php endforeach ?>
                <li>Défausse= $defausse</li>
                <?php foreach($defausse as $carte) : ?>
                <img class="cartegd" src="cartes/<?php echo $carte['image']; ?>" alt="<?php echo $carte['nom']; ?>">
                <?php endforeach ?>
            </ul>
            <li>Pioche restante = $pioche</li>
            <?php foreach($pioche as $carte) : ?>
            <img class="cartept" src="cartes/<?php echo $carte['image']; ?>" alt="<?php echo $carte['nom']; ?>">
            <?php endforeach ?>

        </ol>
    <form action="etape5.php" method="post">
            <button type="submit">recommencer Etape 5</button>
        </form>

        <form action="etape6.php" method="post">
            <button type="submit">étape 6: piocher des cartes</button>
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