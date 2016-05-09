<!-- Contenu HTML des films -->
<div class="container">
    <?php if (!empty($_GET['alert'])): ?>
        <div class="alert alert-info" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php if ($_GET['alert'] === 'bienvenue'): ?>
                <p>Bienvenue sur Cinéma. Vous être maintenant inscrit.Vous pouvez vous authentifier <a href="index.php?page=authentifier">ici</a></p>
            <?php elseif ($_GET['alert'] === 'ajout_confirme'): ?>
                <p>le film à été ajouté</p>
            <?php else : ?>
                <p>pas de messages trouvé </p>
            <?php endif; ?>
        </div>
    <?php endif; ?>
    <h1>Liste des films</h1>
    <p>Filtrer par genre :</p>
    <ul class="list-inline">
        <li><a href="index.php?page=films">tous</a></li>
        <li><a href="index.php?page=films&genre=comedie">comédie</a></li>
        <li><a href="index.php?page=films&genre=drame">drame</a></li>
        <li><a href="index.php?page=films&genre=action">action</a></li>
        <li><a href="index.php?page=films&genre=thriller">thriller</a></li>
        <li><a href="index.php?page=films&genre=romance">romance</a></li>
        <li><a href="index.php?page=films&genre=fantastique">fantastique</a></li>
        <li><a href="index.php?page=films&genre=policier">policier</a></li>       
    </ul>

    <?php
    if (!isset($_GET['genre'])) {
        $les_films = getAllFilms();
    } else {
        $les_films = getAllFilmsByGenre($_GET['genre']);
    }
    ?>
    <div class="row">
        <?php foreach ($les_films as $lefilm) : ?>

            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <?php if (empty($lefilm['jacket'])): ?>
                        <img src="./vues/images/films_jackets/imagenotfound.jpg"  width="20%" alt="">
                    <?php else : ?>
                        <img src="./vues/images/films_jackets/img_thumb/<?= $lefilm['jacket']; ?>"  alt="">
                    <?php endif; ?>
                    <div class="caption">
                        <h3><a href="index.php?page=film&id=<?= $lefilm['id']; ?>"><?= $lefilm['titre']; ?></a></h3>

                        <p>Date de sortie : <?= $lefilm['date_sortie']; ?></p>
                        <p>Réalisateur : <?= $lefilm['realisateur']; ?></p>
                        <p>Acteurs : <?= $lefilm['acteurs']; ?></p>
                        <p>Genre : <?= $lefilm['genres']; ?></p>
                        <p>Description : <?= substr($lefilm['description'], 0, 100); ?>...</p>
                        <!--<p>Note moyenne : <?= $lefilm['note_moyenne']; ?>/5 </p>-->

                        <table>
                            <tr>
                                <td style="padding-right:10px">
                                    <label for="input-3" class="control-label">Note</label>
                                </td>
                                <td>
                                    <input id="stars" value="<?= $lefilm['note_moyenne']; ?>" class="rating-loading" data-size="xs">
                                </td>
                            </tr>
                        </table>
                        <script>
                            $(function () {
                                $('.rating-loading').rating({displayOnly: true, step: 0.5});
                            });
                        </script>
                        <p>
                            <a href="index.php?page=film&id=<?= $lefilm['id']; ?>" class="btn btn-primary" role="button">Voir la suite</a> 
                            <?php if (isset($_SESSION['mail'])): ?>
                                <a href="index.php?page=editer_film&id_film=<?= $lefilm['id']; ?>" class="btn btn-default" role="button">Editer</a>
                                <a href="index.php?page=action_suppression_film&id_film=<?= $lefilm['id']; ?>" class="btn btn-default" role="button">Supprimer</a>
                            <?php endif; ?>
                        </p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>