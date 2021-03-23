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
$(".add-contact").on("click",function (e) {
console.log("j'ai cliqué sur le bouton");
console.log($("#first_name").val());

 });