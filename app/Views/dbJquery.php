
<button class="btn1 btn btn-primary">Toggle</button>
<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ex, recusandae accusantium. Vero, sint consequatur. Tempora quisquam eveniet odio error aliquam, animi doloribus aspernatur ducimus dolorem nemo! Ex nulla velit commodi.</p>
<button class="btn2 btn btn-primary">validate</button>

<hr>
<button class="btn3 btn btn-primary">Ajouter en haut</button>
<br>
<ul>
<?php if(isset($listeContact)):
        foreach($listeContact as $contact):?>
    <l1><?= $contact["first_Name"]?> 
    <a  href="<?=base_url("BaseDeDonner/delete/".$contact["id"])?>">Delete</a>
    <br>
</l1> 
<?php endforeach;
endif; ?>
<li class="waiting">Veuillez patienter</li>
</ul>
<button class="btn5 btn btn-primary">prev</button>

<button class="btn6 btn btn-primary">next</button>
<br>
<br>
<button class="btn4 btn btn-primary">Ajouter en bas</button>

<br><br><br>
<hr>
<div>



<FORM name=FormContact id=FormContact>
            <input type=text name=name value=123>
            <input type=text name=prenom value=456>
            <button type="button" onclick="update_post('#madiv','traiter.php','#Form1');">Envoyer</button>
        </form>
        
        <script>
         
        </script>



<form class="envoi" method="post">
<input name="postForm" type="hidden" value="true">
<br>
<input name="nom" type="text">
<br>

<br>
<br>
<br>
</form>
<button class="formulair1" >Envoyer</button>
</div>
        