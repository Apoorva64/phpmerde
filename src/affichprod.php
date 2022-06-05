<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script >
<p> Admin </p>
<form id="formlogin" method="post" >
<table>
  <tr><td> Code </td><td> <input type="text" name="code" value=""></td>  </tr>
	<tr><td> Nom prod </td><td> <input type="text" name="nomprod" value=""></td>  </tr>
	<tr><td> Description </td><td><input type="text" name="decription" value=""> </td>  </tr>
	<tr><td> Prix </td><td><input type="text" name="prix" value=""> </td>  </tr>
	<tr><td> Photo </td><td><img src='photo/$photo'style='height:100px;width:150px'></img> </td>  </tr>


	<tr><td><input type="button" name="entrer" value="Entrez" onclick='login1();'> </td>  </tr>
</table>
</form>
