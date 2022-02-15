<!-- étape4.php -->
<!-- inclusion des variables  -->
<?php
session_start(); //donne acces à la supervariable $_SESSION qui persiste entre 2 requêtes PHP
if (!isset($_SESSION['deckDepart']))
    {include_once('variables_1.php');
    shuffle($cartes) ;
    $_SESSION['deckDepart']=$cartes;
    }            
$deckDepart=$_SESSION['deckDepart'];
$deck=$deckDepart;
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jeu UNO - Etape4</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" type="image/jpg" href="cartes/uno.png" />
</head>

<body>

    <!-- inclusion de l'entête du site -->
    <?php include_once('header.php'); ?>
    <div id="container">
        <h1>Etape 4 en utilisant une session!</h1>
        les étapes:
        <ol>
            <li>Le deck mélangé : $deckDepart=$_SESSION['deck']</li>


            <?php foreach($deck as $carte) : ?>
            <img class="cartept" src="cartes/<?php echo $carte['image']; ?>" alt="<?php echo $carte['nom']; ?>">
            <?php endforeach ?>


            <li>Distribuer les deux mains </li>
            <?php  
         
            
            $mainJoueur1=[]; $mainJoueur2=[] ;
            for ($i=0;$i<7;$i++){ $mainJoueur1=array_merge($mainJoueur1,array_splice($deck,0,1));
                $mainJoueur2=array_merge($mainJoueur2,array_splice($deck,0,1));} ?>
            <ul>
                <li>Main joueur 1 = $mainJoueur1</li>
                <?php foreach($mainJoueur1 as $carte) : ?>
                <img class="cartegd" src="cartes/<?php echo $carte['image']; ?>" alt="<?php echo $carte['nom']; ?>">
                <?php endforeach ?>
                <li>Main joueur 2 = $mainJoueur2</li>
                <?php foreach($mainJoueur2 as $carte) : ?>
                <img class="cartegd" src="cartes/<?php echo $carte['image']; ?>" alt="<?php echo $carte['nom']; ?>">
                <?php endforeach ?>
            </ul>
            <li>Pioche restante = $deck</li>
            <?php foreach($deck as $carte) : ?>
            <img class="cartept" src="cartes/<?php echo $carte['image']; ?>" alt="<?php echo $carte['nom']; ?>">
            <?php endforeach ?>

        </ol>
        <form action="index.php" method="post">
            <button type="submit">retour à l'étape 1</button>
        </form>

        <form action="etape5.php" method="post">

            <button type="submit">Passer à l'étape 5</button>
        </form>

        Aide à l'étape ( <a target="_blank"
            href="https://openclassrooms.com/fr/courses/918836-concevez-votre-site-web-avec-php-et-mysql/4239476-conservez-des-donnees-grace-aux-sessions-et-aux-cookies">gérer
            les sessions</a>
        )
        <h3>On termine en récupérant les variables de sessions</h3>
        <ol>
            <li>$_SESSION['pioche']</li>
            <li>$_SESSION['mainJoueur1']</li>
            <li>$_SESSION['mainJoueur2'] </li>
        </ol>
        <?php  $_SESSION['pioche']=$deck;
        $_SESSION['mainJoueur1']=$mainJoueur1;
        $_SESSION['mainJoueur2']=$mainJoueur2;
         ?>
    </div>
    <!-- inclusion du bas de page du site -->
    <?php include_once('footer.php'); ?>

</body>

</html>
<!-- Lien peut-être utile https://openclassrooms.com/forum/sujet/transmettre-un-array-via-formulaire-89193 -->