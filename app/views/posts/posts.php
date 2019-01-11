<?php $this->title = 'Nouveau roman de Jean Forteroche : Billet simple pour l\'Alaska'; ?>
<!-- <h2><a class= "btn btn-info btn-lg" href="home/homepage">Page d'accueil</a></h2>  -->
<article>
    <header>
    <?php foreach ($posts as $post) : ?>
        <h3 class='chapterTitle'><?= htmlspecialchars($post->title()) ?></h3>
        <time>Publié le <?= htmlspecialchars($post->date()) ?></time>  
    </header>
    <p><?=substr($post->content(), 0, 100)?>[...]</p>
    <a class= "btn btn-primary" href="<?='post/postComment/'. htmlspecialchars($post->id()) ?>">Lire la suite</a>
    <?php endforeach; ?>
</article>
