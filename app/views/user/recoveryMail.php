<?php $this->title = 'Code de vérification'; ?>
<?php use App\models\Messages; ?>
<?php Messages::displayMsg()?>

<h4>Code de vérification</h4>
<form action="" method='post'class="default-form">
    <div>
        <!-- <label for="email">Votre adresse mail</label><br> -->
        <input type="text" name="verif_code" id="verif_code" placeholder="Code de vérification" >
    </div>
    <br>
    <button class="btn btn-sm btn-primary " type="submit" name="verif_submit">Envoyer</button>    
    <br>
</form>
        



