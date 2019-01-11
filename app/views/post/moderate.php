
<div class="container-fluid">
    <h2>Signaler ce commentaire</h2>
    <section>
        
        <p><?= htmlspecialchars($comment->getAuthor()) ?></P>    
        <p><?= htmlspecialchars($comment->getDate()) ?></P>
        <p><?= htmlspecialchars($comment->getContent()) ?></p>
    </section>
    <div id="resultat"></div>
    <form name= "multiform" id="multiform" action="<?='post/moderateComment/'. htmlspecialchars($comment->getId()) ?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="comment_report" id="comment_report" value="<?=$comment->getReport()?>">
        <input type="hidden" name="id"  value="<?=$comment->getId()?>">
        <button type="submit" name="btnReport" id="btnReport">Oui</button>
    </form>
    <a class="linkAllChapters" href="<?='posts/posts'?>">Tous les chapitres</a>
    <br>
</div>

<script type="text/javascript" src="public/js/report.js"></script> 

  

 










  

