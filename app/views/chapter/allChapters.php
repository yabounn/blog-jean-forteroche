<?php $this->title = 'Tous les chapitres'; ?>
<p><a href="user/userAdmin">accueil administration</a></p>
<p><a href="home/homepage">Voir le blog</a></p><br>

<h5>L'ensemble des chapitres</h5><br>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="table-responsive">
          <table class="table table-bordered">
              <thead>
                  <tr>
                  <th>Publié le</th>
                  <th>Titre</th>
                  <th>Chapitre</th>
                  <th></th>
                  <th></th>
                  <th></th>
                  </tr>
              </thead>

              <tbody>
              <?php foreach ($allChapters as $post) : ?>
              <tr>
                  <td><?= $post->date() ?></td>
                  <td><?= $post->title() ?></td>
                  <td><?= substr($post->content(), 0, 300) ?></td>
                  <td>
                    <form action="<?='chapter/oneChapter/'. htmlspecialchars($post->id()) ?>" method="post">
                      <!-- <button type="submit" class="btn btn-success btn-sm" name="editer" id="editer">Visualiser</button> -->
                      <button type="submit" class="btn btn-success btn-sm" name="editer" id="editer"><i class="far fa-eye"></i></button>
                    </form>
                  </td>
                  <td>
                    <form action="<?='chapter/changeChapter/'. htmlspecialchars($post->id()) ?>" method="post">
                      <!-- <button type="submit" class="btn btn-primary btn-sm" name="changeChapter" id="changeChapter">Modifier</button> -->
                      <button type="submit" class="btn btn-primary btn-sm" name="changeChapter" id="changeChapter">Modifier</button>

                    </form>
                  </td>
                  <td>
                    <form action="<?='chapter/deleteChapter/'. htmlspecialchars($post->id()) ?>" method="post">
                      <!-- <button type="submit" class="btn btn-danger btn-sm" name="deleteChapter" id="deleteChapter">Supprimer</button> -->
                      <button type="submit" class="btn btn-danger btn-sm" name="deleteChapter" id="deleteChapter"><i class="fas fa-times"></i></button>

                    </form>
                  </td>

              </tr>
              <?php endforeach; ?>
              </tbody>
          </table>
      </div>
    </div>
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
                    <a href="admin/allChapters?page=<?=$currentPage - 1 ?>"><i class="fas fa-arrow-alt-circle-left"></i></a>
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
                    <a href="admin/allChapters?page=<?= $i ?>"><i><?= $i ?></i></a>
                </li>
            <?php endif;
            } ?> <!-- Fin boucle -->
            <?php if($currentPage + 1 > $nbPages): ?>
                <li class="page-item disabled">
                    <span><i class="fas fa-arrow-alt-circle-right"></i></span>
                </li>
            <?php else : ?>
                <li class="page-item">
                    <a href="admin/allChapters?page=<?=$currentPage + 1 ?>"><i class="fas fa-arrow-alt-circle-right"></i></a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</div>
