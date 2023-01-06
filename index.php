<!-- etape3.php -->
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
    <title>Jeu UNO - Etape3</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" type="image/jpg" href="cartes/uno.png" />
</head>

<body>

    <!-- inclusion de l'entête du site -->
    <?php include_once('header.php'); ?>

    <div id="container">
        <h1>Affichage mains</h1>
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
            <li>Pioche restante</li>
            <?php foreach($cartes as $carte) : ?>
            <img class="cartept" src="cartes/<?php echo $carte['image']; ?>" alt="<?php echo $carte['nom']; ?>">
            <?php endforeach ?>

        </ol>
       
    </div>
    <!-- inclusion du bas de page du site -->
    <?php include_once('footer.php'); ?>
    
</body>

</html>
