<!-- étape4.php -->
<!-- inclusion des variables  -->
<?php
if (isset($_POST['session'])){
    if ($_POST['session']='debut'){session_start(); }
  //donne acces à la supervariable $_SESSION qui persiste entre 2 requêtes PHP
    if ($_POST['session']='reboot'){
        session_destroy();
        $_SESSION=[];
        session_start(); }
}
if (!isset($_SESSION['deckDepart']))
    {include_once('variables.php');
    shuffle($cartes) ;
    $_SESSION['deckDepart']=$cartes;
    }            
$deckDepart=$_SESSION['deckDepart'];
$deck=$deckDepart;
/*tout ce qui est inscrit ci dessous ira par la suite dans le fichier variables.php*/
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
        <h1>Etape 4 </h1>
        <h2>
      Découverte de la fonction session_start()<br> et de la variable superglobale $_SESSION!<br>
      Cette  variable super globale était nécessaire quand nous passions d'une page php à une autre<br>
      A présent cette étape semble un peu inutile 

    <br> Nous n'avons pas récupéré les cartes de l'étapes 3</h2>
       les étapes:
        <ol>
            <li>Le deck mélangé:</li>
            <?php  
            shuffle($cartes) ;?>

            <?php foreach($cartes as $carte) : ?>
            <img class="cartept" src="cartes/<?php echo $carte['image']; ?>" alt="<?php echo $carte['nom']; ?>">
            <?php endforeach ?>


            <li>Distribuer les deux mains</li>
            <?php  
         
            
            $mainJoueur1=[]; $mainJoueur2=[] ;$defausse=[];
            for ($i=0;$i<7;$i++){ $mainJoueur1=array_merge($mainJoueur1,array_splice($cartes,0,1));
                $mainJoueur2=array_merge($mainJoueur2,array_splice($cartes,0,1));}
                $defausse=array_merge($defausse,array_splice($cartes,0,1)); ?>
            
            <ul>
                <li>Main joueur 1</li>
                <?php foreach($mainJoueur1 as $carte) : ?>
                <img class="cartegd" src="cartes/<?php echo $carte['image']; ?>" alt="<?php echo $carte['nom']; ?>">
                <?php endforeach ?>
                <li>Main joueur 2</li>
                <?php foreach($mainJoueur2 as $carte) : ?>
                <img class="cartegd" src="cartes/<?php echo $carte['image']; ?>" alt="<?php echo $carte['nom']; ?>">
                <?php endforeach ?>
                <li>Défausse</li>
                <?php foreach($defausse as $carte) : ?>
                <img class="cartegd" src="cartes/<?php echo $carte['image']; ?>" alt="<?php echo $carte['nom']; ?>">
                <?php endforeach ?>
            </ul>
            <li>Pioche restante = $deck</li>
            <?php foreach($deck as $carte) : ?>
            <img class="cartept" src="cartes/<?php echo $carte['image']; ?>" alt="<?php echo $carte['nom']; ?>">
            <?php endforeach ?>

        </ol>
        <form action="etape4.php" method="post">
            <button type="submit">réinitialiser via étape 4</button>
        </form>

        <form action="etape5.php" method="post">
            <button type="submit">Passer à l'étape 5 en conservant la distribution</button>
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
            <li>$_SESSION['defausse'] </li>
        </ol>
        <?php  
 /*       Je réinitialise la variable Session si elle existe déjà */
 /*        session_destroy();*/
        session_start();
        $_SESSION['pioche']=$deck;
        $_SESSION['mainJoueur1']=$mainJoueur1;
        $_SESSION['mainJoueur2']=$mainJoueur2;
        $_SESSION['defausse']=$defausse;
         ?>
    </div>
    <!-- inclusion du bas de page du site -->
    <?php include_once('footer.php'); ?>

</body>

</html>
<!-- Lien peut-être utile https://openclassrooms.com/forum/sujet/transmettre-un-array-via-formulaire-89193 -->