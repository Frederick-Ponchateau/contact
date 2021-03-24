/*================================================================================
	Item Name: Materialize - Material Design Admin Template
	Version: 5.0
	Author: PIXINVENT
	Author URL: https://themeforest.net/user/pixinvent/portfolio
================================================================================

NOTE:
------

{
		id: id
	},

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
function pagination(page){
	
	$.ajax({
		url:"http://contact/api/index?page="+page,
		type:"POST",
		data: {
		},
		success:function(res){
			console.log("success",res);
			res.forEach(element => {
				console.log(element.first_Name);
				$("ul").append("<li>"+element.first_Name +"</li>");
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
	//postToAPI("create",param)
 console.log("j'ai cliqué sur le bouton");
 });



 $(".formulair1").on("click",function (e) {
	
	console.log($(".envoi").serialize());
 console.log("j'ai cliqué sur le bouton");
 });
 /************ Exercice **************/
 $(".btn1").on("click",function(e){
	 console.log("j'ai cliqué sur le bouton");
	 /******** Animation cache le text "fast or slow" *****/
	//$("p").toggle("fast");
	//$("p").hide();
	/********* Ajoute une classe */
	$("p").addClass("select");
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
	 
	});

	$(".btn6").on("click",function(e){
	   console.log("next");
	   $(".waiting").show();
	   page += 1;
	   pagination(page);
   });