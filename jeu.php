<!-- index.php -->
<!-- inclusion des variables et fonctions -->
<?php
session_start(); //donne acces à la supervariable $_SESSION qui persiste entre 2 requêtes PHP
include('variables.php');
include_once('functions_jeu.php');

if (isset($_POST['click'])) {
    if ($_POST['click'] == "j1") {
        piocher('j1');
    }
    if ($_POST['click'] == "j2") {
        piocher('j2');
    }
}
if (isset($_GET['action'])) {
    joue($_GET['joueur'], $_GET['numero']);
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jeu UNO - Etape8</title>
    <link rel="stylesheet" href="style8.css">
    <link rel="shortcut icon" type="image/jpg" href="cartes/uno.png" />
</head>

<body>
    <!-- inclusion de l'entête du site -->
    <?php include_once('header.php'); ?>
    <div id="container">
        <h1>Bonne chance!</h1>
        <!--Affichage défausse  -->
        <?php afficherDerniere($_SESSION['defausse']); ?>
        <?php taille($_SESSION['defausse']); ?>
        <ul>

            <li>Votre main<br>
                Cliquez sur la carte que vous désirez déposer sur le tas. <br>
                <br>

                <form action="etape8.php" method="post">
                    <?php afficherMain($_SESSION['mainJoueur1'], 'gd', 'mainJoueur1') ?>
                    <input type="hidden" name="click" value="j1" />
                    <button type="submit">Piocher une cartes</button>
                </form>
            </li>

            <li>Votre Adversaire <?php taille($_SESSION['mainJoueur2']); ?>
                <form action="etape8.php" method="post">
                    <input type="hidden" name="click" value="j2" />
                    <button type="submit">Joueur2: piocher une cartes</button>
                </form>
            </li>
            <?php afficherMain($_SESSION['mainJoueur2'], 'gd', 'mainJoueur2') ?>

        </ul>
        <li class="hidden">Pioche restante = $_SESSION['pioche'] <?php taille($_SESSION['pioche']); ?>
            <?php afficherCartes($_SESSION['pioche'], 'pt') ?></li>
        </ol>

        <form action="etape4.php" method="post">
            <input type="hidden" name="session" value="reboot">
            <button type="submit">Retour à l'étape 4</button>
        </form>


    </div>
    <!-- inclusion du bas de page du site -->
    <?php include_once('footer.php'); ?>

</body>

</html>
<!-- Lien peut-être utile https://openclassrooms.com/forum/sujet/transmettre-un-array-via-formulaire-89193 -->