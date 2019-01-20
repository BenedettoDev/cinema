<?php global $msg_erreur; ?>
<div class="container">
    <h1>Authentification</h1>

    <form class="form-horizontal" role="form" method="post" action="?action=action_authentification">
        <?php if (!empty($msg_erreur['not_found'])): ?>
            <div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?= $msg_erreur['not_found']; ?> (<?= $_POST['mail'] ?>)
            </div>
        <?php endif; ?>
        <div class="form-group  has-feedback <?= (empty($msg_erreur)) ? '' : ((!empty($msg_erreur['mail'])) ? 'has-error' : 'has-success'); ?>">
            <label class="control-label col-sm-2" for="name">Email : </label>
            <div class="col-sm-10">
                <!--<input type="text" class="form-control" id="email" name="mail" value="<?= (empty($msg_erreur['mail']) && isset($_COOKIE['mail'])) ? $_COOKIE['mail'] : (empty($_POST['mail']) && empty($msg_erreur['mail'])) ? '' : $_POST['mail']; ?>"  placeholder="<?= (empty($_POST) || empty($msg_erreur['mail']) && empty($_COOKIE['mail'])) ? 'Entrer Votre Email' : "" ?>">-->
                <input type="text" class="form-control" id="email" name="mail" value="<?= ((empty($_POST['mail'])) ? ((empty($_COOKIE['mail'])) ? '' : $_COOKIE['mail']) : $_POST['mail']) ?>" placeholder="<?= (empty($_COOKIE['mail'])) ? 'Entrer Votre Email' : '' ?>">
                <?php if (!empty($msg_erreur['mail'])): ?>
                    <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
                    <span id="helpBlock2" class="help-block"><?= $msg_erreur['mail']; ?></span>
                <?php elseif (empty($msg_erreur['mail']) && (!empty($_POST['mail']))): ?>
                    <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
                <?php endif; ?> 
            </div>
        </div>

        <div class="form-group has-feedback <?= (empty($msg_erreur)) ? '' : (empty($msg_erreur['mail'])) ? 'has-error' : '' ?>">
            <label class="control-label col-sm-2" for="name">Password : </label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Entrez votre mot de passe">
                <?php if (!empty($msg_erreur)): ?>
                    <span class="glyphicon glyphicon-remove form-control-feedback" data-toggle="tooltip" data-placement="right" aria-hidden="true"></span>
                    <?php if (!empty($msg_erreur['pwd'])): ?>
                        <span id="helpBlock2" class="help-block"><?= $msg_erreur['pwd']; ?></span>
                    <?php endif; ?>
                <?php endif; ?> 
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">S'authentifier</button>
            </div>
        </div>
    </form>

</div>