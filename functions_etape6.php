<?php
function piocher($joueur)
{
    if ($joueur=='j1')
        {  $_SESSION['mainJoueur1']=array_merge($_SESSION['mainJoueur1'],array_splice($_SESSION['pioche'],0,1));}
    if ($joueur=='j2')
        { $_SESSION['mainJoueur2']=array_merge($_SESSION['mainJoueur2'],array_splice($_SESSION['pioche'],0,1));}
}

function afficherCartes($listeCartes,$taille="")
{ foreach($listeCartes as $carte) 
          { echo '<img class="carte'.$taille.'" src="cartes/'.$carte['image'].'" alt="'.$carte['nom'].'">';}
}

function taille($listeCartes)
///affiche ne nombre de cartes
{
    if  (sizeof($listeCartes)==1|sizeof($listeCartes)==0)
    {echo '('.sizeof($listeCartes).' carte)';}
    else {
        echo '('.sizeof($listeCartes).' cartes)';
    }}
?>