<?php
	//echo sha1('admin');

	$code = $_REQUEST["code"];
	$nomprod = $_REQUEST["nomprod"];
	$photo = $_REQUEST["photo"];

	//2)Connexion avec la BD
	include("connexion.php");
	//3) Requete de select
	$reqadmin = mysqli_query($conn, "select * from he_produit where code='$code' and
	nomprod='$nomprod' and photo='$photo'");
	$nbre = mysqli_num_rows($reqadmin);

	echo $nbre;


?>
