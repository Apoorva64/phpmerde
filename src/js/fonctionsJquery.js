//Section recherche su keyup
	$("#search").keyup(function(){
		//serialize le formulaire dans une variable javascript
		var formsearch=$("#formsearch").serialize();
		//Vider le contenu du DIV
		$("#contenu").html("");
		
		//Load le fichier de recherche avec le formulaire serialize
		$("#contenu").load("recherche.php?" + formsearch);
		
	});
	$("#search").click(function(){
	//Effacer le contenu de id="search"
		$("#search").val("");
		$("#contenu").html("Tapez le nom recherche!");
	});
	
	function accueil(){
		//Effacer le contenu de id="liste"
		$("#contenu").html("");
		//Charger la page accueil.php
		$("#contenu").load("accueil.php");
	}
	//Section Ajout de recettes
	function login(){
		//Effacer le contenu de id="liste"
		$("#contenu").html("");
		//Charger la page ajoutrecette.php
		$("#contenu").load("login.php");
	}
	
	function login1()
	{
		var formlogin = $("#formlogin").serialize();
		$("#resultat").load("login1.php?" + formlogin);
	}