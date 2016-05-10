<?php global $msg_erreur; ?>
<div class = "container">
    <h1>Inscription</h1>

    <form class = "form-horizontal" role = "form" method = "post" enctype = "multipart/form-data" action = "?page=action_ajout_utilisateur">
        <?php if (!empty($msg_erreur['mail_exist']) || !empty($msg_erreur['pwd_cmp'])): ?>
            <div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?php if (!empty($msg_erreur['mail_exist'])): ?>
                    <?= $msg_erreur['mail_exist']; ?>
                <?php elseif (!empty($msg_erreur['pwd_cmp'])): ?>
                    <?= $msg_erreur['pwd_cmp']; ?>
                <?php endif; ?>
            </div>
        <?php endif; ?>


        <div class="form-group  has-feedback  <?= (empty($msg_erreur)) ? '' : ((isset($msg_erreur['mail'])) ? 'has-error' : 'has-success'); ?>">
            <label class="control-label col-sm-2" for="mail">Mail  </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="titre" name="mail" placeholder="<?= (empty($msg_erreur)) ? 'Entrer Votre Email' : ''; ?>" <?= (!empty($msg_erreur) && !empty($msg_erreur)) ? "value=" . $_POST['mail'] : ''; ?>>
                <?php if (!empty($msg_erreur['mail'])): ?>
                    <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
                    <span id="helpBlock2" class="help-block"><?= $msg_erreur['mail']; ?></span>
                <?php elseif (empty($msg_erreur['mail']) && (!empty($_POST['mail']))): ?>
                    <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
                <?php endif; ?> 
            </div>
        </div>
        <div class="form-group has-feedback <?= (empty($msg_erreur)) ? '' : 'has-error'; ?>">
            <label  class="control-label col-sm-2" for="pwd">Mot de passe </label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="pwd" name="pwd" >
                <?php if (!empty($msg_erreur)): ?>
                    <span class="glyphicon glyphicon-remove form-control-feedback" data-toggle="tooltip" data-placement="right" aria-hidden="true"></span>
                    <?php if (!empty($msg_erreur['pwd'])): ?>
                        <span id="helpBlock2" class="help-block"><?= $msg_erreur['pwd']; ?></span>
                    <?php endif; ?> 
                <?php endif; ?> 
            </div>
        </div>
        <div  class="form-group has-feedback <?= (empty($msg_erreur)) ? '' : 'has-error'; ?>">
            <label  class="control-label col-sm-2" for="pwd">Mot de passe </label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="pwd" name="pwd2" >
                <?php if (!empty($msg_erreur)): ?>
                    <span class="glyphicon glyphicon-remove form-control-feedback" data-toggle="tooltip" data-placement="right" aria-hidden="true"></span>
                    <?php if (!empty($msg_erreur['pwd2'])): ?>
                        <span id="helpBlock2" class="help-block"><?= $msg_erreur['pwd2']; ?></span>
                    <?php endif; ?> 
                <?php endif; ?> 
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">S'incrire</button>
            </div>
        </div>

    </form>
</div>
