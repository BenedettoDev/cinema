<nav class="navbar navbar-inverse">
    <div class="container-fluid">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="?page=accueil"><span class="glyphicon glyphicon-home"></span>&nbsp;&nbsp;Cinema</a>
        </div>

        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li class='<?= ((!empty($_GET['page']))&&($_GET['page']=='films'))?'active':'';?>'><a href="?page=films">Films</a></li>
                <li class='<?= ((!empty($_GET['page']))&&($_GET['page']=='top_films'))?'active':'';?>'><a href="?page=top_films">Top 5 films</a></li>
                        <?php if (isset($_SESSION['mail'])) : ?>
                <li class='<?= ((!empty($_GET['page']))&&($_GET['page']=='ajout_film'))?'active':'';?>'><a href="?page=ajout_film">Ajouter un film</a></li>
                <?php endif; ?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php if (!isset($_SESSION['mail'])) : ?>
                 <li class='<?= (!empty($_GET['page']))&&($_GET['page']=='inscrire')?'active':'';?>'><a href="?page=inscrire"><span class="glyphicon glyphicon-pencil"></span>&nbsp;S'inscrire</a></li>
                 <li class='<?= (!empty($_GET['page']))&&($_GET['page']=='authentifier')?'active':'';?>'><a href="?page=authentifier"><span class="glyphicon glyphicon-log-in"></span>&nbsp;S'authentifier</a></li>
                <?php else : ?>
                <li><a href="?page=deconnexion"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Déconnexion ( <?= $_SESSION['mail'];?> )</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

