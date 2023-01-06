<!-- etape2.php -->
<!-- inclusion des variables -->
        <?php
            include_once('variables.php');
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

    </div>
    <!-- inclusion du bas de page du site -->
    <?php include_once('footer.php'); ?>
</body>

</html>