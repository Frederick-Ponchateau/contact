<html>
<!-- <form action="//base_url("LienEtRedirection/index");" method="get">
    <input type="text" name="page">
    <input type="email" name="email">
    <button type= "submit">Envoyer</button>
</form> -->
<!-- <form action="// base_url("formulaire/index")?>" method="post">
    <input type="email" name="email">
    <br>
    <?php  /*if(isset($validation) && $validation->hasError('email') ){ 
            echo "Une adresse est requis" ;
       }  */ ?>
    <br>
    <button type= "submit">Envoyer</button>
</form> -->
<form action="<?=base_url("formulaire/index")?>" method="post">
<input name="postForm" type="hidden" value="true">
<br>
<input name="nom" type="text">
<br>
<?php  if(isset($validation) && $validation->hasError('nom') && $request->getvar('postForm') == "true"){ 
          // echo "Un nom est requis" ;
            echo $validation->getError("nom");
       }   ?>
<br>
<input name="prenom" type="text">
<br>
<?php  if(isset($validation) && $validation->hasError('prenom') && $request->getvar('postForm') == "true"){ 
            //echo "Un prenom est requis" ;
            echo $validation->getError("prenom");
       }   ?>
<br>
<input type="email" name="email">
<br>
<?php  if(isset($validation) && $validation->hasError('email') && $request->getvar('postForm') == "true"){ 
            //echo "Un prenom est requis" ;
            echo $validation->getError("email");
       }   ?>
<br>
<br>
<button type= "submit">Envoyer</button>
</form>



</html>