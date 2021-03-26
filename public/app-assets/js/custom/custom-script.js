/*================================================================================
	Item Name: Materialize - Material Design Admin Template
	Version: 5.0
	Author: PIXINVENT
	Author URL: https://themeforest.net/user/pixinvent/portfolio
================================================================================

NOTE:
------

PLACE HERE YOUR OWN JS CODES AND IF NEEDED.
WE WILL RELEASE FUTURE UPDATES SO IN ORDER TO NOT OVERWRITE YOUR CUSTOM SCRIPT IT'S BETTER LIKE THIS. */
/******** Fonction d'appel API *********/
var page = 1; //param pagination
function postToAPI(url,dataParam)
{
	$.ajax({
	url:"http://contact/api/" + url,
	type:"POST",
	data:dataParam,
	success:function(res){
	   console.log("success",res);
	},
	error:function(){
	   console.log("error");
	}

 })
}
function updateTr(id,name,email,phone){

 return `<tr class="listTr" id="${id}">                                                                  
	<td class="center-align contact-checkbox">
	  <label class="checkbox-label">
		<input type="checkbox" name="foo" />
		<span></span>
	  </label>
	</td>              
	<div id="replace">
	<td>${name} </td>
	<td>${email}</td>
	<td>${phone}</td>
  </div>
	<!-- definition data js -->
	<td><span class="favorite"><i data-role="favory" data-ref="${id}" data-nom="admin" class="material-icons"> star_border </i></span></td>
	<td><span  class="delete" ><i data-role="delete" data-ref="${id}" class="material-icons delete">delete_outline</i></span></td>
  </tr> `
}
function pagination(page){
	
	$.ajax({
		url:"http://contact/api/index?page="+page,
		type:"POST",
		data: {
		},
		success:function(res){
			console.log("success",res);
			res.forEach(element => {
				console.log(element.first_Name+element.last_Name);
			 	$("#listContact").append(updateTr(element.id,element.first_Name +" "
				 +element.last_Name,element.email,element.phone));



				// $("#listContact").append("<td>"+element.first_Name +" "+element.last_Name+"</td>");
				// $("#listContact").append("<td>"+element.email+"</td>");
				// $("#listContact").append("<td>"+element.phone+"</td>");
				// $("#listContact").append("</tr>");

			});
			
		},
		error:function(){
			console.log("error");
		}
		
	})
}
// Add contact
 $(".add-contact").on("click",function (e) {
	var param =  $("form.edit-contact-item").serialize();
	console.log($("form.edit-contact-item").serialize());
	// var param = {
	// 	name: $("#first_name").val(),
	// 	prenom: $("#last_name").val(),
    //     phone: $("#phone").val()

	//  };
	postToAPI("create",param)
 console.log("j'ai cliqué sur le bouton");
 });



 $(".formulair1").on("click",function (e) {
	
	console.log($(".envoi").serialize());
 console.log("j'ai cliqué sur le bouton");
 });
 /************ Exercice **************/
 /*$(".btn1").on("click",function(e){
	 console.log("j'ai cliqué sur le bouton");*/
	 /******** Animation cache le text "fast or slow" *****/
	//$("p").toggle("fast");
	//$("p").hide();
	/********* Ajoute une classe */
	/*$("p").addClass("select");
 });
 $(".btn2").on("click",function(e){
	console.log("j'ai cliqué sur le bouton 2");
	$("p").toggle("slow");
	//$("p").hide();
	$("p").removeClass();

 });

 $(".btn3").on("click",function(e){
	console.log("j'ajoute avant");
	$("ul").prepend("<li>Avant</li>");
 });

 $(".btn4").on("click",function(e){
	console.log("j'ajoute après");
	$("ul").append("<li>Après</li>");
 });

 
 $(".btn5").on("click",function(e){
	 console.log("prev");
	 page -= 1;
	 if(page<1){
		page=1;
	}
	 pagination(page);
	 
	});*/

	$(".btnPrev").on("click",function(e){
	   console.log("prev");
	   //$("#listContact").remove();
	   //$("#listContact.tr").show();
	   page -= 1;
	   if(page<1){
		page=1;
	}
	   pagination(page);
   });
   $(".btnNext").on("click",function(e){
	console.log("next");
	console.log(e);
	//$(".listTr").remove();
	page += 1;
	if(page<1){
		page=1;
	}
	pagination(page);
});
