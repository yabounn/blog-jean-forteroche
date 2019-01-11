<?php use App\models\Messages; ?>
<?php Messages::displayMsg()?>
<?php $this->title = 'Page d\'authentification'; ?> 

  <body class="text-center">

    <form class="form-signin" action="<?='auth/login'?>" method="post">
      <div class="text-center mb-4">
        <h1 class="h3 mb-3 font-weight-normal">Identifiants de connexion</h1>
      </div>
      
      <div class="form-label-group">
        <input type="text" class="form-control" name="username" id="username" placeholder="Pseudo" >
        <label for="username">Pseudo</label>
      </div>

      <div class="form-label-group">
        <input type="password" class="form-control" name="password" id="password" placeholder="Password" >
        <label for="password">Password</label>
      </div>

       <button class="btn btn-sm btn-primary " type="submit" name="login" id="login">Se connecter</button>
      <p><a href="user/forgetPass" class="forgetPassword"><b>Mot de passe oublié</b></a></p>
      <p class="mt-5 mb-3 text-muted text-center">&copy; 2018-2019</p>
    </form> 
  </body> 
  
</html>
