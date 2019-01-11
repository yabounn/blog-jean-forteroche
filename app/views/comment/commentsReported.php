<?php $this->title = "Tous les commentaires" ?>
<p><a href="user/userAdmin">Accueil administration</a></p>
<p><a href="home/homepage">Voir le blog</a></p><br>

<div class="container-fluid">
    <h2>Voici les commentaires signalés:</h2><br>
    <div class="table-responsive">
        <table class="table table-bordered table-hover ">
            <thead>
                <tr>
                <!-- <th scope="col">commentId</th> -->
                <th scope="col">Numéro<br>du chapitre</th>
                <th scope="col">Date</th>
                <th scope="col">Auteur</th>
                <th scope="col">Commentaire</th>
                <th scope="col"><a href="comment/commentsReported" id="sortReport">Signalement</a></th>
                <th scope="col">Valider le<br>commentaire</th>
                <th scope="col">Supprimer le<br>commentaire</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($commentsReported as $comment): ?>
                <tr>
                <!-- <td><?= htmlspecialchars($comment->getId()) ?></td> -->
                <td><?= htmlspecialchars($comment->getChapterId()) ?></td>
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

<!--Pagination  -->
<div class="row">
    <div class="col-lg-12">
        <ul class="pagination pagination-lg">
            <?php if($currentPage - 1 == 0): ?>
                <li class="page-item disabled">
                    <span><i class="fas fa-arrow-alt-circle-left"></i></span>
                </li>
                <br>
            <?php else : ?>
                <li class="page-item">
                    <a href="comment/commentsReported?page=<?=$currentPage - 1 ?>"><i class="fas fa-arrow-alt-circle-left"></i></a>
                </li>
                <br>
            <?php endif;?>
            <?php 
            for ($i = 1; $i <= $nbPages; $i++) {
                if($i == $currentPage): ?>
            
                <li class="page-item-active">
                    <a><?= $i ?></a>        
                </li>
                <br>           
            <?php else : ?>
                <li class="page-item">
                    <a href="comment/commentsReported?page=<?= $i ?>"><i><?= $i ?></i></a>
                </li>
                <br>
            <?php endif; 
            } ?> <!-- Fin boucle -->
            <?php if($currentPage + 1 > $nbPages): ?>
                <li class="page-item disabled">
                    <span><i class="fas fa-arrow-alt-circle-right"></i></span>
                </li>
                <br>
            <?php else : ?>
                <li class="page-item">
                    <a href="comment/commentsReported?page=<?=$currentPage + 1 ?>"><i class="fas fa-arrow-alt-circle-right"></i></a>
                </li>
                <br>
            <?php endif; ?>     
        </ul>
    </div>
</div>