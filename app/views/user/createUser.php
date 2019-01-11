
<?php $this->title = 'Création d\'un profil utilisateur'; ?> 
<p><a href="user/userAdmin">home</a></p><br>

  <body class="text-center">

    <form class="form-signin" action="<?='user/createUser'?>" method="post">
      <div class="text-center mb-4">
        <h1 class="h3 mb-3 font-weight-normal">Création du profil utilisateur</h1>
      </div>
      
      <div class="form-label-group">
        <label for="username">Nom d'utilisateur</label>
        <input type="text" class="form-control" name="username" id="username" required>
      </div>

      <div class="form-label-group">
        <label for="password">Mot de passe</label>
        <input type="password" class="form-control" name="password" id="password" required>
      </div>

      <div class="form-label-group">
        <label for="passwordConfirm">Confirmer le mot de passe</label>
        <input type="password" class="form-control" name="passwordConfirm" id="passwordConfirm" required>
      </div>

       <div class="form-label-group">
        <label for="email">Adresse mail</label>
        <input type="email" class="form-control" name="email" id="email" required>
      </div>

       <button class="btn btn-sm btn-primary " type="submit" name="login" id="login">Créer profil</button>
      
      <p class="mt-5 mb-3 text-muted text-center">&copy; 2018-2019</p>
    </form> 
  </body> 
</html>
