<!-- Contenu HTML des films -->
<body>
    <div class="container">
        <h1>Top 5 des films</h1>
        <?php $le_top_films = getAllTopFilms(); ?>
        <ol>
            <?php foreach ($le_top_films as $film) : ?>
                <li><?= $film['titre']; ?> (<?= $film['note_moyenne']; ?>/5)</li>
            <?php endforeach; ?>
        </ol>
    </div>
</body>