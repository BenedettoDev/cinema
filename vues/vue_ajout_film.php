<?php global $msg_erreur; ?>
<div class="container">
    <h1>Ajout d'un film</h1>

    <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data" action="?action=action_ajout_film">
        <div class="form-group  has-feedback <?= (empty($msg_erreur)) ? '' : ((!empty($msg_erreur['titre'])) ? 'has-error' : 'has-success'); ?>">
            <label class="control-label col-sm-2" for="name">Titre  </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="titre" name="titre" placeholder="Entrez le titre" value="<?= (empty($_POST['titre'])) ? '' : $_POST['titre']; ?>">
                <?php if (!empty($msg_erreur['titre'])): ?>
                    <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
                    <span id="helpBlock2" class="help-block"><?= $msg_erreur['titre']; ?></span>
                <?php elseif (!empty($msg_erreur)) : ?>
                    <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
                <?php endif; ?> 
            </div>
        </div>
        <div class="form-group  has-feedback <?= (empty($msg_erreur)) ? '' : 'has-error'; ?>">
            <label class="control-label col-sm-2" for="name"> Jacket  </label>
            <div class="col-sm-10">
                <input id="input-2" type="file" multiple class="file-loading  btn btn-default" name="fichier">  
                <?php if (!empty($msg_erreur['image_name'])): ?>
                    <span id="helpBlock2" class="help-block"><?= $msg_erreur['image_name']; ?></span>
                <?php endif; ?> 
                <script type="text/javascript">
                    $(function () {
                        $("#input-2").fileinput({
                            allowedFileExtensions: ["jpg", "jpeg"],
                            showCaption: true,
                            showRemove: true,
                            showUpload: false
                        });
                    });
                </script>
            </div>

        </div>
        <div class="form-group  has-feedback <?= (empty($msg_erreur)) ? '' : ((!empty($msg_erreur['date'])) ? 'has-error' : 'has-success'); ?>">
            <label class="control-label col-sm-2" for="name">Date de sortie  </label>
            <div class="col-sm-10">
                <div class='input-group date' id='datetimepicker2'>
                    <input type='text' name='date' class="form-control" placeholder="Cliquer ici pour entrer une date" value="<?= (empty($_POST['date'])) ? '' : $_POST['date']; ?>"/>
                    <span class="input-group-addon">
                        <?php if (!empty($msg_erreur['date'])): ?>
                             <span class="glyphicon glyphicon-remove"></span><br>
                        <?php elseif (empty($msg_erreur)): ?>
                            <span class="glyphicon glyphicon-calendar"></span><br>
                        <?php else : ?>
                            <span class="glyphicon glyphicon-ok"></span><br>
                        <?php endif; ?>
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
        <div class="form-group  has-feedback <?= (empty($msg_erreur)) ? '' : ((!empty($msg_erreur['realisateur'])) ? 'has-error' : 'has-success'); ?>">
            <label class="control-label col-sm-2" for="name">Réalisateur </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="realisateur" name="realisateur" placeholder="Entrez le ou les réalisateur(s)" value="<?= (empty($_POST['realisateur'])) ? '' : $_POST['realisateur']; ?>">
                <?php if (!empty($msg_erreur['realisateur'])): ?>
                    <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
                    <span id="helpBlock2" class="help-block"><?= $msg_erreur['realisateur']; ?></span>
                <?php elseif (!empty($msg_erreur)): ?>
                    <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
                <?php endif; ?> 
            </div>
        </div>
        <div class="form-group  has-feedback <?= (empty($msg_erreur)) ? '' : ((!empty($msg_erreur['acteurs'])) ? 'has-error' : 'has-success'); ?>">
            <label class="control-label col-sm-2" for="name">Acteurs </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="acteurs" name="acteurs" placeholder="Entrez le ou  les acteur(s)" value="<?= (empty($_POST['acteurs'])) ? '' : $_POST['acteurs']; ?>">
                <?php if (!empty($msg_erreur['acteurs'])): ?>
                    <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
                    <span id="helpBlock2" class="help-block"><?= $msg_erreur['acteurs']; ?></span>
                <?php elseif (!empty($msg_erreur)): ?>
                    <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group  has-feedback <?= (empty($msg_erreur)) ? '' : ((!empty($msg_erreur['genres'])) ? 'has-error' : 'has-success'); ?>">
            <label class="control-label col-sm-2" for="name">Genres </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="genres" name="genres" placeholder="Entrez le ou les genre(s)" value="<?= (empty($_POST['genres'])) ? '' : $_POST['genres']; ?>">
                <?php if (!empty($msg_erreur['genres'])): ?>
                    <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
                    <span id="helpBlock2" class="help-block"><?= $msg_erreur['genres']; ?></span>
                <?php elseif (!empty($msg_erreur)): ?>
                    <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
                <?php endif; ?> 
            </div>
        </div>
        <div class="form-group  has-feedback <?= (empty($msg_erreur)) ? '' : ((!empty($msg_erreur['desc'])) ? 'has-error' : 'has-success'); ?>">
            <label class="control-label col-sm-2" for="name">Description </label>
            <div class="col-sm-10">
                <textarea class="form-control" rows="3" name="desc"><?= (empty($_POST['desc'])) ? '' : $_POST['desc']; ?></textarea>
                <?php if (!empty($msg_erreur['desc'])): ?>
                    <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
                    <span id="helpBlock2" class="help-block"><?= $msg_erreur['desc']; ?></span>
                <?php elseif (!empty($msg_erreur)) : ?>
                    <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group  has-feedback <?= (empty($msg_erreur)) ? '' : ((!empty($msg_erreur['note'])) ? 'has-error' : 'has-success'); ?>">
            <label class="control-label col-sm-2" for="name">Note </label>
            <div class="col-sm-10">
                <input id="input-7-xs" class="rating rating-loading" name="note" value="<?= (empty($_POST['note'])) ? '1' : $_POST['note']; ?>" data-min="0" data-max="5" data-step="0.1" data-size="xs" ><hr/>
                <script type="text/javascript">
                    $(function () {
                        $("#input-7-xs").rating();
                    });
                </script>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Ajouter</button>
            </div>
        </div>
    </form>
</div>