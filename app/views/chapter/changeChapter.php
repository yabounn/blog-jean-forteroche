<?php $this->title = 'Modifier un chapitre' ?>

<p><a href="user/userAdmin">Accueil administration</a></p>
<p><a href="home/homepage">Voir le blog</a></p><br>
<div class="container-fluid">
    <h4>Modifier le chapitre</h4><br>
    <article>
        <form action="" method="post">
            <!-- <label for="title">Titre du chapitre</label><br> -->
            <input type="text"  name="title" id="title" value="<?= $changeChapter->title() ?>"><br><br>
            <!-- <label for="content">Contenu du chapitre</label><br> -->
            <!-- <textarea name="content" id="content" cols="100" rows="30" placeholder="Titre du chapitre"></textarea><br><br> -->
            <textarea name="mytextarea" id="mytextarea" cols="100" rows="30" ><?= $changeChapter->content()  ?></textarea><br><br>    
            <button type="submit" id="btn_changeChapter">Modifier</button>
        </form>
    </article>
</div>