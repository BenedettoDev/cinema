<?php

include_once('modeles/connexion_db.php');

function verifier_authentification($data) {

    global $msg_erreur;

    // ajout htmlspecialchars
    $data = verif_caracteres_speciaux($data);

    // Vérification conformité de l'email
    if (!verif_conformite_mail() | !verif_champs_vides($data,'utilisateurs')) {
        return FALSE;
    }


    try {
        global $dbh;

        // Cryptage en MD5
        $pwd = hash('md5', $data['pwd']);

        $sql = "SELECT * FROM utilisateurs WHERE mail=:mail and password=:pwd";
        $sth = $dbh->prepare($sql);
        $sth->bindParam(':mail', $data['mail']);
        $sth->bindParam(':pwd', $pwd);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_OBJ);
    } catch (Exception $e) {
        echo $e->getMessage();
    }

    // Vérifie si l'utilisateur se trouve bien dans la DB
    if (empty($result)) {
        $msg_erreur['not_found'] = 'Aucun résultats trouvé';
        $msg_erreur['mail'] = 'Mail non trouvé';
        $msg_erreur['pwd'] = 'Password non trouvé';
        $dbh = NULL;
        return FALSE;
    }
    return TRUE;
}

function inscrire_utilisateur($data) {

    global $msg_erreur;

    // ajout htmlspecialchars
    $data = verif_caracteres_speciaux($data);

    //vérifie le format de l'email et les champs vides
    if (!verif_conformite_mail() | !verif_champs_vides($data,'utilisateurs')) {
        return FALSE;
    }

    // Compare les deux mots de passe et vérrifie s'il sont identiques
    if (strcmp($data['pwd'], $data['pwd2']) <> 0) {
        $msg_erreur['pwd_cmp'] = "les mots de passe ne correspondent pas.";
        return FALSE;
    }
    // Vérifie si le mail est déjà enregistré
    try {
        global $dbh;
        $sql = "SELECT * FROM utilisateurs WHERE mail=:mail";
        $sth = $dbh->prepare($sql);
        $sth->bindvalue(':mail', $data['mail']);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_OBJ);
    } catch (Exception $e) {
        $dbh = NULL;
        echo $e->getMessage();
    }

    if (!empty($result)) {
        $msg_erreur['mail_exist'] = 'Le mail (' . $data['mail'] . ') existe existe déjà';
        $msg_erreur['mail'] = 'Veuillez changer votre adresse mail pour vous connecter.';
        $dbh = NULL;
        return FALSE;
    }

    try {
        global $dbh;
        //Cryptage du mdp
        //++++++++++++++++++++++++++
        $pwd = hash('md5', $data['pwd']);

        $sql = "INSERT INTO utilisateurs (mail,password) VALUES (:mail,:password)";

        // Ajout prépare + bindParam
        //+++++++++++++++++++++++++++++++++ 
        $sth = $dbh->prepare($sql);
        $sth->bindvalue(':mail', $data['mail']);
        $sth->bindvalue(':password', $pwd);
        $sth->execute();
    } catch (Exception $e) {
        $dbh = NULL;
        echo $e->getMessage();
    }
    $dbh = NULL;
    return TRUE;
}
