<?php

// Ne pas oublier d'inclure la librairie Form
require_once PATH_LIB.'form.php';

// "formulaire_connexion" est l'ID unique du formulaire
$form_connexion = new Form('formulaire_connexion');

$form_connexion->method('POST');

$form_connexion->add('Text', 'nom_utilisateur')
    ->label("Votre nom d'utilisateur");

$form_connexion->add('Password', 'mot_de_passe')
    ->label("Votre mot de passe");

$form_connexion->add('Submit', 'submit')
    ->value("Connectez-moi !");

// Pré-remplissage avec les valeurs précédemment entrées (s'il y en a)
$form_connexion->bound($_POST);

// Création d'un tableau des erreurs
$erreurs_connexion = array();

// Validation des champs suivant les règles
if ($form_connexion->is_valid($_POST)) {

    list($nom_utilisateur, $mot_de_passe) =
        $form_connexion->get_cleaned_data('nom_utilisateur', 'mot_de_passe');

    // On veut utiliser le modèle des membres (~/models/membres.php)
    require_once PATH_MODEL.'membres.php';

    // combinaison_connexion_valide() est définit dans ~/models/membres.php
    $id_utilisateur = combinaison_connexion_valide($nom_utilisateur, sha1($mot_de_passe));

    // Si les identifiants sont valides
    if (false !== $id_utilisateur) {

        $infos_utilisateur = lire_infos_utilisateur($id_utilisateur);

        // On enregistre les informations dans la session
        $_SESSION['id']     = $id_utilisateur;
        $_SESSION['pseudo'] = $nom_utilisateur;
        $_SESSION['avatar'] = $infos_utilisateur['avatar'];
        $_SESSION['email']  = $infos_utilisateur['adresse_email'];

        // Affichage de la confirmation de la connexion
        require_once PATH_VIEW.'connexion_ok.php';

    } else {

        $erreurs_connexion[] = "Couple nom d'utilisateur / mot de passe inexistant.";

        // On réaffiche le formulaire de connexion
        require_once PATH_VIEW.'formulaire_connexion.php';
    }

} else {

    // On réaffiche le formulaire de connexion
    require_once PATH_VIEW.'formulaire_connexion.php';
}
