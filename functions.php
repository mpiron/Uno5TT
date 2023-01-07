<?php


function piocher($joueur)
{
    if ($joueur == 'j1') {
        $_SESSION['mainJoueur1'] = array_merge($_SESSION['mainJoueur1'], array_splice($_SESSION['pioche'], 0, 1));
    }
    if ($joueur == 'j2') {
        $_SESSION['mainJoueur2'] = array_merge($_SESSION['mainJoueur2'], array_splice($_SESSION['pioche'], 0, 1));
    }
    if ($joueur == 'defausse') {
        $_SESSION['defausse'] = [];
        $_SESSION['defausse'] = array_merge($_SESSION['defausse'], array_splice($_SESSION['pioche'], 0, 1));
    }
}

function afficherCartes($listeCartes, $taille = "")
{
    foreach ($listeCartes as $carte) {
        echo '<img class="carte' . $taille . '" src="cartes/' . $carte['image'] . '" alt="' . $carte['nom'] . '">';
    }
}

function taille($listeCartes)
///affiche ne nombre de cartes
{
    if (sizeof($listeCartes) == 1 | sizeof($listeCartes) == 0) {
        echo '(' . sizeof($listeCartes) . ' carte)';
    } else {
        echo '(' . sizeof($listeCartes) . ' cartes)';
    }
}

function afficherMain($listeCartes, $taille = "", $joueur = "mainJoueur1")
/*les paramètre de cette fonction; L'array avec les cartes, la taille d'affichage ( "", "pt" ou "gd"), le joueur ("mainJoueur1" ou "mainJoueur2") ' */
{
    $compteur = 0;
    foreach ($listeCartes as $carte) {
        echo '<a href="?numero=' . $compteur . '&joueur=' . $joueur . '&action=joue"><img class="carte' . $taille . '" src="cartes/' . $carte['image'] . '" alt="' . $carte['nom'] . '"></a>';
        $compteur += 1;
    }
}

function joue($joueur, $numeroCarte)
{
    $_SESSION['defausse'] = array_merge($_SESSION['defausse'], array_splice($_SESSION[$joueur], $numeroCarte, 1));
    /*Le dernier 1 veut dire qu'on ne prend qu'une carte*/
}

function afficherDerniere($listeCartes, $nombre = "2")
{
    $numero = sizeof($listeCartes) - 1;/*le but de cette ligne est de connaitre le nombre de carte pour afficher la dernière*/ {
        echo '<img class="cartegd" src="cartes/' . $listeCartes[$numero]['image'] . '" alt="' . $listeCartes[$numero]['nom'] . '">';
    }
}
