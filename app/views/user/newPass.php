<?php $this->title = 'Réinitialisation du mot de passe'; ?>
<?php use App\models\Messages; ?>
<?php Messages::displayMsg()?>

<h4>Réinitialisation du mot de passe</h4>
<form action="" method='post'>
                
    <div>
        <label for="pass">Votre nouveau mot de passe</label><br>
        <input type="password" name="newPass" required>
    </div>               
    <br>
    <div>
        <label for="pass">Confirmez votre nouveau mot de passe</label><br>
        <input type="password" name="newPassVerif" required>
    </div>
    <br>        
    <button class="btn btn-sm btn-primary " type="submit" name="validate_submit" >Validez</button>    
</form>
        