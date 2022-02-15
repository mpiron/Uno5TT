<!-- etape2.php -->
<!-- inclusion des variables -->
        <?php
            include_once('variables_1.php');
        ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jeu UNO - Etape 2</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" type="image/jpg" href="cartes/uno.png" />
</head>

<body>

    <!-- inclusion de l'entête du site -->
    <?php include_once('header.php'); ?>
    <div id="container">
        <h1>Cartes mélangées</h1>
        <?php
            shuffle($cartes) ;
            ?>
        <?php foreach($cartes as $carte) : ?>
        <img class="carte" src="cartes/<?php echo $carte['image']; ?>" alt="<?php echo $carte['nom']; ?>">
        <?php endforeach ?>

        <form action="index.php" method="post">
            <button type="submit">retour à l'étape 1</button>
        </form>
        <form action="etape2.php" method="post">
            <button type="submit">Mélanger à nouveau</button>
        </form>
        <form action="etape3.php" method="post">
            <button type="submit">Passer à l'étape 3</button>
        </form>

    </div>
    <!-- inclusion du bas de page du site -->
    <?php include_once('footer.php'); ?>
</body>

</html>