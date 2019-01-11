<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Le dernier ouvrage de Jean Forteroche intitulé billet simple pour l'Alaska,est présenté sous la forme d'un blog.Il souhaite,à travers ce roman impliquer ses lecteurs,en leur proposant de réagir aux chapitres publiés sur ce blog. ">
    <base href="<?= $racineWeb ?>">
    <title><?=$title?></title>
    <link rel="stylesheet" href="app/lib/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Hind+Madurai" rel="stylesheet">
    <link rel="stylesheet" href="public/css/style.css">

    <script type="text/javascript" src="public/js/jquery/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="app/lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  </head>
  <body>
    <div class="container">
      <header class="blog-header">
        <h1 class="bookTitle">Billet simple pour l'Alaska par Jean Forteroche</h1>
      </header>

      <div class="burger">
        <div class="toggle_btn">
            <span></span>
        </div>
        <div class="menu navigation">
          <a class="logo" href="home/homepage"><i class="fas fa-book"></i></a>
          <a href="home/homepage">Accueil</a>
          <a href="posts/posts">Les chapitres</a>
          <a href="auth/login">Connexion</a>
          <a href="auth/logout">Se déconnecter</a>
          <!-- <a href="#">Contact</a> -->
        </div>
      </div> <!-- burger -->
      <div class="jumbotron bg-white">
        <div class=" content">
          <?=$content?>
        </div>
      </div>
    </div> <!-- container -->

      <!-- <div id="container"> -->
        <!-- <div class="text-center" class="homeText">
          <p>Bienvenue!<br>Pour mon douzième roman,j'ai souhaité vous le faire découvrir dans un tout autre format que celui d'un livre papier,un blog.</p>
        </div> -->
        <!-- <br>
        <br> -->
        <!-- <section class="row">
          <div class="col-lg-12" id="content">
            
          </div>
        </section>
        <hr> -->
        <footer>
          <p>Mentions légales</p>
        </footer>
      <!-- </div>  container-->
      <script type="text/javascript" src="public/js/navigation.js">

      </script>
  </body>
</html>
