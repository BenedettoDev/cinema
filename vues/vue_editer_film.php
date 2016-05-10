<?php $film = getFilmById($_GET['id_film']); ?>
<div class="container">
    <h1>Editer film : <?= $film[0]['titre'] ?></h1>


    <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data" action="?action=action_editer_film">
        <div class="form-group  has-feedback">
            <label class="control-label col-sm-2" for="name">Titre  </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="titre" name="titre" <?= 'value="' . $film[0]['titre'] . '"' ?>>
            </div>
        </div>
        <div class="form-group  has-feedback">
            <label class="control-label col-sm-2" for="name"> Jacket  </label>
            <div class="col-sm-10">
                <input type="hidden" value="./vues/images/films_jackets/<?= $film[0]['jacket'] ?>"  name="chemin_image">
                <input type="hidden" value="<?= $film[0]['cle'] ?>"  name="cle">
                <input id="input-2" type="file" value="4" multiple class="file-loading" name="fichier" >  
                <script type="text/javascript">
                    $(function () {
                        $("#input-2").fileinput({
                            initialPreview: [
                                "<img src='./vues/images/films_jackets/<?= $film[0]['jacket'] ?>' class='file-preview-image' alt='' title=''>"
                            ],
                            browseClass: "btn btn-info",
                            browseLabel: 'Image',
                            allowedFileExtensions: ["jpg", "png", "JPG", "PNG", "jpeg", "JPEG"],
                            showCaption: true,
                            showRemove: true,
                            showUpload: false
                        });
                    });
                </script>
            </div>

        </div>
        <div class="form-group  has-feedback">
            <label class="control-label col-sm-2" for="name">Date de sortie  </label>

            <div class="col-sm-10">

                <div class='input-group date' id='datetimepicker2'>
                    <input type='text' name='date' class="form-control"  <?= 'value="' . $film[0]['date_sortie'] . '"' ?> />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>

            </div>

            <script type="text/javascript">
                $(function () {
                    $('#datetimepicker2 input').datetimepicker({
                        viewMode: 'years',
                        format: 'YYYY-MM-DD'

                    });
                });
            </script>
        </div>
        <div class="form-group  has-feedback">
            <label class="control-label col-sm-2" for="name">Réalisateur </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="realisateur" name="realisateur" <?= 'value="' . $film[0]['realisateur'] . '"' ?> >
            </div>
        </div>
        <div class="form-group  has-feedback">
            <label class="control-label col-sm-2" for="name">Acteurs </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="acteurs" name="acteurs" <?= 'value="' . $film[0]['acteurs'] . '"' ?> >
            </div>
        </div>
        <div class="form-group  has-feedback">
            <label class="control-label col-sm-2" for="name">Genres </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="genres" name="genres" <?= 'value="' . $film[0]['genres'] . '"' ?>>
            </div>
        </div>
        <div class="form-group  has-feedback">
            <label class="control-label col-sm-2" for="name">Description </label>
            <div class="col-sm-10">
                <textarea class="form-control" rows="3" name="desc"> <?= $film[0]['description'] ?></textarea>
            </div>
        </div>
        <div class="form-group  has-feedback">
            <label class="control-label col-sm-2" for="name">Note </label>
<!--            <div class="col-sm-10">
                <input type="text" class="form-control" id="note" name="note"  <?= 'value="' . $film[0]['note_moyenne'] . '"' ?>>
            </div>-->
            <div class="col-sm-10">
                <input id="input-7-xs" class="rating rating-loading" name="note" value="<?= $film[0]['note_moyenne'] ?>" data-min="0" data-max="5" data-step="0.1" data-size="xs"><hr/>
                <script type="text/javascript">
                    $(function () {
                        $("#input-7-xs").rating();
                    });
                </script>
            </div>

        </div>
        <input type='hidden' name="id" value="<?= $film[0]['id']; ?>">
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Editer</button>
            </div>
        </div>
    </form>
</div>