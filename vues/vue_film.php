<?php
$lefilm = getFilmById($_GET['id']);
?>
<div class='container'>
    <div class="col-xs-12 col-md-6">

        <?php if (empty($lefilm[0]['jacket'])): ?>
            <img src="./vues/images/films_jackets/imagenotfound.jpg"  width="50%" height="auto" alt="">
        <?php else : ?>
            <img src="./vues/images/films_jackets/<?= $lefilm[0]['jacket']; ?>"  width="50%" height="auto" alt="">
        <?php endif; ?>
    </div>
    <div class="col-xs-12 col-md-6">
        <h2><?= $lefilm[0]['titre']; ?></h2>
        <p>Date de sortie : <?= $lefilm[0]['date_sortie']; ?></p>
        <p>Réalisateur : <?= $lefilm[0]['realisateur']; ?></p>
        <p>Acteurs : <?= $lefilm[0]['acteurs']; ?></p>
        <p>Genre : <?= $lefilm[0]['genres']; ?></p>
        <p>Description : <?= $lefilm[0]['description']; ?></p>
        <p>Note moyenne : <?= $lefilm[0]['note_moyenne']; ?>/5 </p>
    </div>
</div>