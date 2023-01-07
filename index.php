<!-- index.php -->
<!-- inclusion des variables et fonctions -->
<?php
session_start(); //donne acces à la supervariable $_SESSION qui persiste entre 2 requêtes PHP
include('variables.php');
include_once('functions.php');

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
    <title>Jeu UNO - Etape 8</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" type="image/jpg" href="cartes/uno.png" />
</head>

<body>
    <!-- inclusion de l'entête du site -->
    <?php include_once('header.php'); ?>
    <div id="container">
        <h1>Etape 8: Nettoyage des éléments inutiles</h1>
        <span class="hidden">Le deck mélangé : $deckDepart <?php taille($deckDepart); ?>
            <?php foreach ($deckDepart as $carte) : ?>
                <img class="cartept" src="cartes/<?php echo $carte['image']; ?>" alt="<?php echo $carte['nom']; ?>">
            <?php endforeach ?>
        </span>

        <h2>Affichage des deux mains </h2>
        <?php if (!isset($_SESSION['mainJoueur1']))
        // distribution des cartes
        {
            $mainJoueur1 = [];
            $mainJoueur2 = [];
            $defausse = [];
            for ($i = 0; $i < 7; $i++) {
                $mainJoueur1 = array_merge($mainJoueur1, array_splice($deckDepart, 0, 1));
                $mainJoueur2 = array_merge($mainJoueur2, array_splice($deckDepart, 0, 1));
            }
            $defausse = array_merge($defausse, array_splice($deckDepart, 0, 1));
            $_SESSION['mainJoueur1'] = $mainJoueur1;
            $_SESSION['mainJoueur2'] = $mainJoueur2;
            $_SESSION['defausse'] = $defausse;
            $_SESSION['pioche'] = $deckDepart;
        }
        ?>
        <ul>
            <li>Votre main <br>
                <?php afficherMain($_SESSION['mainJoueur1'], 'gd', 'mainJoueur1') ?> vous avez
                <?php taille($_SESSION['mainJoueur1']); ?> en main. <br>
                <form action="index.php" method="post">
                    <input type="hidden" name="click" value="j1" />
                    <button type="submit">Piocher</button>
                </form>
                <br>
                Vous pouvez cliquer sur une carte pour la jouer ou demander une nouvelle carte.
            </li>

            <li>Main de votre adversaire (dans les étapes à venir, celle-ci sera cachée!)
                <?php taille($_SESSION['mainJoueur2']); ?> <br>
                <?php afficherMain($_SESSION['mainJoueur2'], 'gd', 'mainJoueur2') ?>
                <form action="index.php" method="post">
                    <input type="hidden" name="click" value="j2" />
                    <button type="submit">Joueur2: piocher</button>
                </form>
            </li>
        </ul>
        
        <h2>Défausse</h2>
        <?php afficherDerniere($_SESSION['defausse']); ?>

        <div class="hidden">Pioche restante = $_SESSION['pioche'] <?php taille($_SESSION['pioche']); ?>
            <br>
            <?php afficherCartes($_SESSION['pioche'], 'pt') ?>
        </div>

    </div>
    <!-- inclusion du bas de page du site -->
    <?php include_once('footer.php'); ?>

</body>

</html>