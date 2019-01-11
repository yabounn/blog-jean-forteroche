<?php $this->title = 'Billet simple pour l\'Alaska'; ?>
<div class="container-fluid">
  <article>
    <header>
  <?php foreach ($homePage as $post) : ?>
      <h3 class='postTitle'><?= $post->title() ?></h3>
      <time>Publié le : <?= $post->date() ?></time>
    </header>
    <p><?= substr($post->content(), 0, 100)?>[...]</p>
    <a class= "btn btn-primary" href="<?='post/postComment/'. htmlspecialchars($post->id()) ?>">Lire la suite</a>
    <br>
    <br>  
  <?php endforeach; ?>
  </article>
</div>
