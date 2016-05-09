<?php

include_once('modeles/connexion_db.php');

function getFilmById($id_film) {
    global $dbh;

    $sql = "SELECT * FROM films WHERE id=:id";
    $sth = $dbh->prepare($sql);
    $sth->bindvalue(':id', $id_film);
    $sth->execute();
    return $sth->fetchAll(PDO::FETCH_ASSOC);
}

function getAllFilms() {
    global $dbh;
    $sql = "SELECT * FROM Films ORDER BY titre asc ";
    $sth = $dbh->query($sql);
    return $sth->fetchAll(PDO::FETCH_ASSOC);
}

function getNextIdFilm() {
    global $dbh;
    $sql = "SELECT MAX(id) as nb FROM Films ";
    $sth = $dbh->query($sql);
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $result[0]['nb'] + 1;
}

function getAllFilmsByGenre($genre) {
    global $dbh;
    $genre_param = '%' . $genre . '%';
    $sql = "SELECT * FROM films WHERE genres LIKE :genre_param";
    $sth = $dbh->prepare($sql);
    $sth->bindvalue(':genre_param', $genre_param);
    $sth->execute();
    return $sth->fetchAll(PDO::FETCH_ASSOC);
}

function getAllTopFilms() {
    global $dbh;
    $sql = "SELECT * FROM Films ORDER BY note_moyenne DESC LIMIT 5";
    $sth = $dbh->query($sql);
    return $sth->fetchAll(PDO::FETCH_ASSOC);
}

function ajouterUnFilm($data) {
    global $msg_erreur;

    // $id est utilisé pour le cryptage de l'image.
    $id = getNextIdFilm();

    $titre = $data['titre'];
    $jacket = $_FILES['fichier']['tmp_name'];
    $nom_jacket = $_FILES['fichier']['name'];
    $date = $data['date'];
    $realisateur = $data['realisateur'];
    $acteurs = $data['acteurs'];
    $genres = $data['genres'];
    $desc = $data['desc'];
    $note = $data['note'];

    $content_dir = './vues/images/films_jackets/'; // dossier où sera déplacé le fichier
    $chemin_fichier = $content_dir . $jacket;

    // ajout htmlspecialchars
    $data = verif_caracteres_speciaux($data);

    // Vérification conformité de l'email
    if (!verif_champs_vides($data, 'films') | !verif_champs_vides($_FILES['fichier'], 'image')) {
        return FALSE;
    }

    if (!file_exists($chemin_fichier)) {
        if (!is_uploaded_file($jacket)) {
            exit("Le fichier est introuvable");
        }
        // on vérifie maintenant l'extension
        $type_file = $_FILES['fichier']['type'];

        if (!strstr($type_file, 'jpg') && !strstr($type_file, 'jpeg')) {
            $msg_erreur['image_name'] = "Le fichier n'est pas une image";
            return false;
        }
        $type_file = '.' . substr($type_file, 6, strlen($type_file));
        // on copie le fichier dans le dossier de destination
        $name_file = "IMG_$id" . md5($nom_jacket) . $type_file;
        $chemin = $content_dir . $name_file;
        if (!move_uploaded_file($jacket, $chemin)) {
            exit("Impossible de copier le fichier dans $content_dir");
        }
        if (!ajouter_image_thumbnail($chemin, $name_file)) {
            exit("problème img_thumbnail");
        }
    }
    global $dbh;
    $sql = "INSERT INTO films (titre, date_sortie,realisateur, acteurs,genres,description,note_moyenne,jacket,cle)VALUES (:titre,:date,:realisateur,:acteur,:genre,:desc,:note,:jacket,:cle)";
    $sth = $dbh->prepare($sql);
    $sth->bindvalue(':titre', $titre);
    $sth->bindvalue(':date', $date);

    $sth->bindvalue(':realisateur', $realisateur);
    $sth->bindvalue(':acteur', $acteurs);
    $sth->bindvalue(':genre', $genres);
    $sth->bindvalue(':desc', $desc);
    $sth->bindvalue(':note', $note);
    $sth->bindvalue(':jacket', $name_file);
    $sth->bindvalue(':cle', $nom_jacket);
    $sth->execute();

    return TRUE;
}

function editerUnFilm($film) {
    global $dbh;
    $id = $film['id'];
    $titre = $film['titre'];
    $date = $film['date'];
    $realisateur = $film['realisateur'];
    $acteurs = $film['acteurs'];
    $genres = $film['genres'];
    $desc = $film['desc'];
    $note = $film['note'];

    $content_dir = './vues/images/films_jackets/'; // dossier où sera déplacé le fichier
    // Ancienne jacket 
    $chemin_image = $film['chemin_image'];
    $nom_ancienne_jacket = substr($chemin_image, strlen($content_dir), strlen($chemin_image));
    $nom_acienne_cle = $film['cle'];

    // Nouvelle jacket
    $nom_nouvelle_jacket = $_FILES['fichier']['tmp_name'];
    $nom_nouvelle_cle = $_FILES['fichier']['name'];

    // mettre à jour là clé
    if (empty($nom_nouvelle_cle)) {
        $nom_nouvelle_cle = $nom_acienne_cle;
    } else {
        $nom_nouvelle_jacket_format = $nom_ancienne_jacket;

        $nom_nouvelle_jacket_format = "IMG_$id" . md5($nom_nouvelle_cle) . ".jpeg";
   

        if (strcmp($nom_nouvelle_jacket_format, $nom_ancienne_jacket) <> 0) {

            // on vérifie maintenant l'extension
            $type_file = $_FILES['fichier']['type'];

            if (!strstr($type_file, 'jpg') && !strstr($type_file, 'jpeg') && !strstr($type_file, 'png')) {
                exit("Le fichier n'est pas une image");
            }

            $type_file = '.' . substr($type_file, 6, strlen($type_file));

            if (!is_uploaded_file($nom_nouvelle_jacket)) {
                exit("Le fichier est introuvable");
            }

            // on copie le fichier dans le dossier de destination
            $chemin = $content_dir . $nom_nouvelle_jacket_format;
            if (!move_uploaded_file($nom_nouvelle_jacket, $chemin)) {
                exit("Impossible de copier le fichier dans $content_dir");
            }

            if (!ajouter_image_thumbnail($chemin, $nom_nouvelle_jacket_format)) {
                exit("problème img_thumbnail");
            }
            // On efface les anciennes images afin d'optimiser l'espace mémoire.
            unlink ( $content_dir.$nom_ancienne_jacket);    
            unlink ( $content_dir.'img_thumb/'.$nom_ancienne_jacket);    
        }
    }

    $sql = "UPDATE films "
            . "SET titre=:titre,date_sortie=:date_sortie,realisateur=:realisateur,acteurs=:acteurs,genres=:genres,description=:description,note_moyenne=:note_moyenne,jacket=:jacket,cle=:cle WHERE id=:id";
    $sth = $dbh->prepare($sql);
    $sth->bindvalue(':id', $id);
    $sth->bindvalue(':titre', $titre);
    $sth->bindvalue(':date_sortie', $date);
    $sth->bindvalue(':realisateur', $realisateur);
    $sth->bindvalue(':acteurs', $acteurs);
    $sth->bindvalue(':genres', $genres);
    $sth->bindvalue(':description', $desc);
    $sth->bindvalue(':note_moyenne', $note);
    $sth->bindvalue(':jacket', $nom_nouvelle_jacket_format);
    $sth->bindvalue(':cle', $nom_nouvelle_cle);

    $sth->execute();
}

function supprimer_film($idFilm) {
    global $dbh;
    $sql = 'DELETE FROM films WHERE id=:id_film';
    $sth = $dbh->prepare($sql);

    $sth->bindvalue(':id_film', $idFilm);
    $sth->execute();
}

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function ajouter_image_thumbnail($chemin, $name) {
    $largeur = 340;
    $hauteur = 70;

    $image = imagecreatefromjpeg($chemin);
    $taille = getimagesize($chemin);

    $sortie = imagecreatetruecolor($largeur, $hauteur);

    $coef = min($taille[0] / $largeur, $taille[1] / $hauteur);

    $deltax = $taille[0] - ($coef * $largeur);
    $deltay = $taille[1] - ($coef * $hauteur);

    imagecopyresampled($sortie, $image, 0, 0, $deltax / 2, $deltay / 2, $largeur, $hauteur, $taille[0] - $deltax, $taille[1] - $deltay);

//    header('Content-type: image/jpeg');
    if (!imagejpeg($sortie, "./vues/images/films_jackets/img_thumb/$name", 100)) {
        return FALSE;
    }
    return TRUE;
}
