<?php
function piocher($joueur,$nombre){
    if joueur==j1
        {$mainJoueur1=array_merge($mainJoueur1,array_splice($deck,0,nombre));}
    if joueur==j2
        {$mainJoueur2=array_merge($mainJoueur2,array_splice($deck,0,nombre));}
}



if (isset($_SESSION['pioche']))
    {if ($_SESSION['pioche']=="j1")
        {   piocher(j1,1);
            $_SESSION['pioche']=="/";}
    if ($_SESSION['pioche']=="j2")
        {   piocher(j2,1);
            $_SESSION['pioche']=="/";}
        }

?>