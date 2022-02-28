<?php


function piocher($joueur)
{
    if ($joueur=='j1')
        {  $_SESSION['mainJoueur1']=array_merge($_SESSION['mainJoueur1'],array_splice($_SESSION['pioche'],0,1));}
    if ($joueur=='j2')
        { $_SESSION['mainJoueur2']=array_merge($_SESSION['mainJoueur2'],array_splice($_SESSION['pioche'],0,1));}
    if ($joueur=='defausse')
        { $_SESSION['defausse']=[];
        $_SESSION['defausse']=array_merge($_SESSION['defausse'],array_splice($_SESSION['pioche'],0,1));}
    }

function afficherCartes($listeCartes)
{ foreach($listeCartes as $carte) 
          { echo '<img class="cartept" src="cartes/'.$carte['image'].'" alt="'.$carte['nom'].'">';}
}

function afficherMain($listeCartes,$etape)
{ foreach($listeCartes as $carte) 
          { echo '<a href="'.$etape.'"><img class="carte" src="cartes/'.$carte['image'].'" alt="'.$carte['nom'].'"></a>';}
}

function taille($listeCartes)
///affiche ne nombre de cartes
{
    if  (sizeof($listeCartes)==1|sizeof($listeCartes)==0)
    {echo '('.sizeof($listeCartes).' carte)';}
    else {
        echo '('.sizeof($listeCartes).' cartes)';
    }
}

function initialiserDefausse()
/*Cette fonction s'exécute si j'ai cliqué sur initialiser défausse et que la défausse n'existe pas encore*/
{if (isset($_POST['click'])) 
    {if (($_POST['click']=='initialiserDefausse')&& !isset($_SESSION['defausse']))
        {echo 'Defausse Initialisée';
        piocher('defausse');

        } afficherCartes($_SESSION['defausse']);
    }   
    else echo "/";    
}


?>