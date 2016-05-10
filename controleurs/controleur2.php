<?php

// Utilisation du mécanisme de session
session_start();

// INCLUSION DES MODELES POUR QU'ILS SOIENT DISPONIBLES
include('modeles/modele_verif_form.php');
include('modeles/modele_films.php');
include('modeles/modele_utilisateurs.php');

// CONTROLE DU CHOIX D'AFFICHAGE DE PAGE ET D'ACTION A EFFECTUER
$choix = (isset($_GET['page'])) ? $_GET['page'] : 'accueil';

// UTILISATEUR AUTHENTIFIE
include('vues/layout/vue_menu.php');
if (!isset($_SESSION['mail'])) {
    switch ($choix) {
        case 'accueil' :
            include('vues/vue_accueil.php');
            break;
        case 'film':
            include ('vues/vue_film.php');
            break;
        case 'films' :
            include('vues/vue_films.php');
            break;
        case 'top_films' :
            include('vues/vue_top_films.php');
            break;
        case 'authentifier' :
            include('vues/vue_authentifier.php');
            break;
        case 'action_authentification' :
            gerer_authentification();
            break;
        case 'inscrire' :
            include('vues/vue_ajout_utilisateur.php');
            break;
        case 'action_ajout_utilisateur':
            gerer_inscription();
            break;
        default:
            include('vues/vue_accueil.php');
            break;
    }
} else {
    switch ($choix) {
        case 'accueil' :
            include('vues/vue_accueil.php');
            break;
        case 'film':
            include ('vues/vue_film.php');
            break;
        case 'editer_film':
            edition_film();
            break;
        case 'action_edit_film':
            gerer_edit_film();
            break;
        case 'films' :
            include('vues/vue_films.php');
            break;
        case 'top_films' :
            include('vues/vue_top_films.php');
            break;
        case 'authentifier' :
            include('vues/vue_authentifier.php');
            break;
        case 'action_authentification' :
            gerer_authentification();
            break;
        case 'ajout_film' :
            include('vues/vue_ajout_film.php');
            break;
        case 'action_ajout_film' :
            gerer_ajout_film();
            break;
        case 'action_suppression_film':
            gerer_suppression_film();
            break;
        case 'deconnexion' :
            gerer_deconnexion();
            break;
        default:
            include('vues/vue_authentifier.php');
            break;
    }
}

include('vues/layout/vue_footer.php');

function edition_film() {
    $film = getFilmById($_GET['id_film']);
    require_once 'vues/vue_edit_film.php';
}

function gerer_authentification() {
    if (verifier_authentification($_POST)) {
        session_regenerate_id();
        $_SESSION['mail'] = $_POST['mail'];
        setcookie('mail', $_POST['mail']);
        header('Location:index.php?page=films');
    } else {
        require_once ('vues/vue_authentifier.php');
    }
}

function gerer_deconnexion() {
    session_destroy();
    unset($_SESSION);
    header('Location:index.php?page=accueil');
}

function gerer_edit_film() {
    editerUnFilm($_POST);
    header('Location:index.php?page=films');
}

function gerer_ajout_film() {
    if (ajouterUnFilm($_POST)){
       header('Location:index.php?page=films&alert=ajout_confirme');     
    }  else {
        require_once ('vues/vue_ajout_film.php');
    }
}

function gerer_suppression_film() {
    supprimer_film($_GET['id_film']);
    header('Location:index.php?page=films');
}

function gerer_inscription() {
    if (inscrire_utilisateur($_POST)) {
        header('Location:index.php?page=films&alert=bienvenue');
    } else {
        require_once ('vues/vue_ajout_utilisateur.php');
    }
}
