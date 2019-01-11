<?php $this->title = "Tous les commentaires" ?>
<p><a href="user/userAdmin">Accueil administration</a></p>
<p><a href="home/homepage">Voir le blog</a></p><br>

 <!-- Tous les commentaires insérés dans un tableau -->
<div class="container-fluid">
    <h2>Voici l'intégralité des commentaires:</h2><br>
    <div class="table-responsive">
        <table class="table table-dark table-bordered table-hover">
            <thead>
                <tr>
                <!-- <th scope="col">commentId</th> -->
                <th scope="col">Nom<br>du chapitre</th>
                <th scope="col">Date</th>
                <th scope="col">Auteur</th>
                <th scope="col">Commentaire</th>
                <th scope="col"><a href="comment/commentsReported" id="sortReport">Signalement</a></th>
                <th scope="col">Valider le<br>commentaire</th>
                <th scope="col">Supprimer le<br>commentaire</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($allComments as $comment): ?>
                <tr>
                <td><?= htmlspecialchars($comment->getchapter()->title()) ?></td>
                <td><?= htmlspecialchars($comment->getDate()) ?></td>
                <td><?= htmlspecialchars($comment->getAuthor()) ?></td>
                <td><?= htmlspecialchars($comment->getContent()) ?></td>
                <td><?= htmlspecialchars($comment->getReport()) ?></td>
                <td>
                    <form action="<?='comment/validate/'. htmlspecialchars($comment->getId()) ?>" method="post">
                        <input type="hidden" name="comment_id" value="<?=$comment->getReport()?>">
                        <button type="submit" class="btn btn-success btn-sm" name="validate" id="validate">Approuver</button>
                    </form>
                </td>
                <td>
                    <form action="<?='comment/delete/'. htmlspecialchars($comment->getId()) ?>" method="post">
                        <input type="hidden" name="comment_id" value="<?=$comment->getReport()?>">
                        <button type="submit" class="btn btn-danger btn-sm" name="deleteComment" id="deleteComment">Supprimer</button>
                    </form>
                </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!--Trier les signalements-->
<!-- <div class="sortReport">
    <form action="admin/report" method="post">
        <button type="submit" class="btn btn-primary btn-sm" name="sortReport" id="sortReport">Trier les signalements</button>
    </form>
</div> -->

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
                    <a href="comment/allComments?page=<?=$currentPage - 1 ?>"><i class="fas fa-arrow-alt-circle-left"></i></a>
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
                    <a href="comment/allComments?page=<?= $i ?>"><i><?= $i ?></i></a>
                </li>
            <?php endif;
            } ?> <!-- Fin boucle -->
            <?php if($currentPage + 1 > $nbPages): ?>
                <li class="page-item disabled">
                    <span><i class="fas fa-arrow-alt-circle-right"></i></span>
                </li>
            <?php else : ?>
                <li class="page-item">
                    <a href="comment/allComments?page=<?=$currentPage + 1 ?>"><i class="fas fa-arrow-alt-circle-right"></i></a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</div>
