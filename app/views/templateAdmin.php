<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <base href="<?= $racineWeb ?>">
        <title><?=$title?></title>
        <link rel="stylesheet" href="app/lib/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="public/css/styleAdmin.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

        <script type="text/javascript" src="public/js/tinymce/tinymce.min.js"></script>
        <script type="text/javascript" src="public/js/tinymce.js"></script>
        <script type="text/javascript" src="public/js/jquery/jquery-3.3.1.min.js"></script>
    </head>
    
    <body>
        <div id="container">
            <header >
                <h2 id="bookTitle">Espace d'administration</h2>                
            </header>
            <section>
                <div id="content">
                    <?=$content?>
                </div>
            </section>
            <hr>
            <footer>
                <p>Mentions légales</p>
            </footer>
        </div>
    </body>
</html>