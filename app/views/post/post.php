<?php $this->title = $postComment->title() ?>
<?php use App\models\Messages; ?>
<?php Messages::displayMsg()?>

    <div class="container-fluid">
        <article>
            <header>
                <a class="btn btn-primary" href="posts/posts">Tous les chapitres</a>
                <h2 class='postTitle'><?= $postComment->title() ?></h2>
                <b><time>Publié le <?= $postComment->date() ?></time></b>
            </header>
            <br>
            <section>
                <p><?= $postComment->content() ?></p>
            </section>
        </article>
        <hr>
        <!-- Fil de commentaires -->
        <h4 class="postComment">Commentaires</h4>
          <?php foreach ($comments as $comment): ?>
              <div id="messages"></div>
              <br>
              <br>
              <p><?= htmlspecialchars($comment->getAuthor()) ?></P>
              <p><?= htmlspecialchars($comment->getContent()) ?></p>

              <!-- Bouton signalment modal -->
              <button type="button" id="showModal" class="btn btn-primary btn-sm reporting" data-comment-id = "<?= $comment->getId() ?>" data-toggle="modal" data-target="#reportModal">
              Signaler
              </button>
          <?php endforeach; ?>

          <!-- Fenêtre modale -->
          <div class="modal fade" id="reportModal" tabindex="-1" role="dialog" aria-labelledby="title-report" aria-hidden="true">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="title-report">Confirmer le signalement</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-primary submit-reporting">Valider</button>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                  </div>
                  </div>
                  <input type="hidden" name="id" id="commentId"  value="">
              </div>
          </div>

        <!--Pagination  -->
        <div class="row">
            <div class="col-lg-12">
                <ul class="pagination pagination-lg">
                    <?php if($currentPage - 1 == 0): ?>
                        <li class="page-item disabled">
                            <span><i class="fas fa-arrow-alt-circle-left"></i></span>
                        </li>
                    <?php else : ?>
                        <li class="page-item">
                            <a href="post/postComment/<?=$postComment->id()?>?page=<?=$currentPage - 1 ?>"><i class="fas fa-arrow-alt-circle-left"></i></a>
                        </li>
                    <?php endif;?>
                    <?php
                    for ($i = 1; $i <= $nbPages; $i++) {
                        if($i == $currentPage): ?>

                        <li class="page-item-active">
                            <a><?= $i ?></a>
                        </li>
                    <?php else : ?>
                        <li class="page-item">
                            <a href="post/postComment/<?=$postComment->id()?>?page=<?= $i ?>"><i><?= $i ?></i></a>
                        </li>
                    <?php endif;
                    } ?> <!-- Fin boucle -->
                    <?php if($currentPage + 1 > $nbPages): ?>
                        <li class="page-item disabled">
                            <span><i class="fas fa-arrow-alt-circle-right"></i></span>
                        </li>
                    <?php else : ?>
                        <li class="page-item">
                            <a href="post/postComment/<?=$postComment->id()?>?page=<?=$currentPage + 1 ?>"><i class="fas fa-arrow-alt-circle-right"></i></a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>

        <!-- Formulaire pour le commentaire user -->
        <hr />
        <h4 class="addComment">Ajouter un commentaire</h4>
        <form class="form-signin" id= "formAjax" action="" method="post">
            <div class="form-label-group">
                <input type="text" class="form-control" name="author" id="author" placeholder="Votre pseudo"><br>
                <label for="author">Pseudo</label>
            </div>

            <div class="form-label-group">
                <textarea name="commentUser" class="form-control" id="commentUser" cols="30" rows="10" placeholder="Commentaire"></textarea><br>
                <!-- <label for="content">Votre commentaire</label> -->
            </div>

            <input type="hidden" name="postId" id="postId" value="<?= $_GET['id'] ?>">
            <div id="flash" align="left"></div>
            <button type="submit" class="btn btn-primary submit-commentUser">Envoyer</button>
        </form>
    </div>

<script type="text/javascript" src="public/js/report.js"></script>
<script type="text/javascript" src="public/js/commentUser.js"></script>
