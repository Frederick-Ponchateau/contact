<br><br><br><br>
<?php if(isset($listeContact)):
        foreach($listeContact as $contact):?>
        <br>
        <h1><?= $contact["id"]?></h1>
        <br>
        <?= $contact["first_Name"]?>
        <br>
        <?= $contact["last_Name"]?>
        <br>
        <?= $contact["email"]?>
        <br>
        <?= $contact["phone"]?>
        <br>
        <a  href="<?=base_url("BaseDeDonner/delete/".$contact["id"])?>">Delete</a>
<?php endforeach;
endif; ?>
