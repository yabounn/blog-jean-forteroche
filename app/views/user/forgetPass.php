<?php $this->title = 'Adresse mail pour réinitialisation'; ?> 
<?php use App\models\Messages; ?>
<?php Messages::displayMsg()?>

<h4>Réinitialisation du mot de passe</h4>
<p>Entrez votre adresse mail pour recevoir un code de vérification</p>
<form action="" method='post'class="default-form">
    <div>
        <!-- <label for="email">Votre adresse mail</label><br> -->
        <input type="email" name="recup_mail" id="recup_mail" placeholder="Votre adresse mail" >
    </div>
    <br>
    <button class="btn btn-sm btn-primary " type="submit" name="recup_submit" ">Validez</button>    
</form>
 
  
