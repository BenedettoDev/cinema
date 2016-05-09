<?php

/**
 * htmlspecialchars - Convertit les caractères spéciaux en entités HTML
 * @param array $data
 * @return array
 */
function verif_caracteres_speciaux($data) {
    foreach ($data as $key => $value) {
        $data[$key] = htmlspecialchars($data[$key], ENT_QUOTES);
    }
    return $data;
}

/**
 * Vérification des champs vides. En cas de champs vides le tableau
 * $msg_erreur récupère le type de champ et le message correspondant. 
 * @param array $data
 * @return array
 */
function verif_champs_vides($data, $nom_modele) {
    global $msg_erreur;
    switch ($nom_modele) {
        case 'utilisateurs':
            if (array_key_exists('mail', $data) && empty($data['mail'])) {
                $msg_erreur['mail'] = 'Le champ " Email " est vide';
            }
            if (array_key_exists('pwd', $data) && empty($data['pwd'])) {
                $msg_erreur['pwd'] = 'Le champ " Mot de passe " est vide';
            }
            if (array_key_exists('pwd2', $data) && empty($data['pwd'])) {
                $msg_erreur['pwd2'] = 'Le champ " Mot de passe " est vide';
            }
            break;
        case 'films':
            if (array_key_exists('titre', $data) && empty($data['titre'])) {
                $msg_erreur['titre'] = 'Le champ " titre " est vide';
            }
            if (array_key_exists('date', $data) && empty($data['date'])) {
                $msg_erreur['date'] = 'Le champ " date " est vide';
            }
            if (array_key_exists('realisateur', $data) && empty($data['realisateur'])) {
                $msg_erreur['realisateur'] = 'Le champ " realisateur " est vide';
            }
            if (array_key_exists('acteurs', $data) && empty($data['acteurs'])) {
                $msg_erreur['acteurs'] = 'Le champ " titre " est vide';
            }
            if (array_key_exists('genres', $data) && empty($data['genres'])) {
                $msg_erreur['genres'] = 'Le champ " genres " est vide';
            }
            if (array_key_exists('desc', $data) && empty($data['desc'])) {
                $msg_erreur['desc'] = 'Le champ " desc " est vide';
            }
            if (array_key_exists('note', $data) && empty($data['note'])) {
                $msg_erreur['note'] = 'Le champ " note " est vide';
            }
            break;
        case 'image':
            if (array_key_exists('name', $data) && empty($data['name'])) {
                $msg_erreur['image_name'] = 'Le champ Upload Image est vide';
            }
    }

    if (!empty($msg_erreur)) {
        return FALSE;
    }
    return TRUE;
}

/**
 * Vérifie le format de l'email ( exemple: dupont@hotmail.com )
 * en cas de problème de format de l'email le tableau
 * $msg_erreur récupère le type de champ et le message correspondant. 
 * @return array
 */
function verif_conformite_mail() {
    global $msg_erreur;
    $resultat = filter_input(INPUT_POST, 'mail', FILTER_VALIDATE_EMAIL);
    if (empty($resultat)) {
        $msg_erreur['mail'] = "L'email entrer n'est pas conforme à un mail classic exemple: dupont@hotmail.com";
    }
    if (!empty($msg_erreur)) {
        return FALSE;
    }
    return TRUE;
}
