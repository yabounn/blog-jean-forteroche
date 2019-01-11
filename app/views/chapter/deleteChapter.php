<?php $this->title = 'Supprimer un commentaire' ?>
<p><a href="user/userAdmin">Accueil administration</a></p>
<p><a href="home/homepage">Voir le blog</a></p><br>

<div class="container-fluid">
    <h4>Vous désirez supprimer ce chapitre intitulé : <?= $deleteChapter->title() ?> </h4>
    <p><a href="user/userAdmin">accueil administration</a></p>
    <article>
        <header>
            <h2 class='postTitle'><?= $deleteChapter->title() ?></h2>
            <time>Publié le <?= $deleteChapter->date() ?></time> 
        </header>
        <p><?= $deleteChapter->content() ?></p>  
    </article>

    <form action="chapter/deleteChapter/<?= htmlspecialchars($deleteChapter->id()) ?>" method="post">
        <button type="submit" name="supprimer" id="supprimer">Confirmer</button>
    </form>
</div>