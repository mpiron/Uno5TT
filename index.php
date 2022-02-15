<!-- index.php -->
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
    <title>Jeu UNO - Page d'accueil</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" type="image/jpg" href="cartes/uno.png"/>
</head>
<body >

        <!-- inclusion de l'entête du site -->
        <?php include_once('header.php'); ?>
    <div id="container">
        <h1>Présentation des cartes</h1>
               
        <?php foreach($cartes as $carte) : ?>
                <img class="carte" src="cartes/<?php echo $carte['image']; ?>" alt="<?php echo $carte['nom']; ?>">
        <?php endforeach ?>

        <form action="etape2.php" method="post">
            <button type="submit" >Passer à l'étape 2</button>
        </form>
    </div>
    <!-- inclusion du bas de page du site -->
    <?php include_once('footer.php'); ?>

  
</body>
</html>