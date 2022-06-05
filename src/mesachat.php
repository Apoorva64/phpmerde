<?php


?>
<style>
    body {
        margin: 0;
        padding: 0;
        font-family: sans-serif;
        background-image: url("photo/back.jpg");
    }

    .menu {
        width: 100%;
        height: 50px;
        background: black;
        overflow: auto;
    }

    .menu ul {
        margin: 0;
        padding: 0;
        list-style: none;
        line-height: 50px;
    }

    .menu li {
        float: left;
    }

    .menu ul li a {
        background: black;
        text-decoration: none;
        width: 130px;
        display: block;
        text-align: center;
        color: #f2f2f2;
        font-size: 15px;
        font-family: sans-serif;
        letter-spacing: 0.2px;
    }

    menu li a:hover {
        color: #fff;
        opacity: 0.5;
        font-size: 15px;
    }

    .search-form {
        margin-top: 15px;
        float: right;
        margin-right: 460px;
    }

    input[type=text] {
        padding: 7px;
        border: none;
        font-size: 15px;
        width: 350px;
        font-family: sans-serif;
        white-space: nowrap;

    }
</style>

<body>

    <nav class="menu">
        <ul>
            <li><a href="acheterprod.php?lien=achter"> Retour </a></li>
            <li><a href="index.php?lien=Deconnexion"> Deconnexion </a></li>

        </ul>
    </nav>
</body>
<form method="post">
    <br> <br> <br>

    <input type="text" name="search" value="">
    <input type="submit" name='recherche' value="Rechercher...">

</form>
<script type="text/javascript">
    function imprimer(page) {
        window.open(page, "Impression", "menubar=no, status=no, scrollbars=no, menubar=no, width=900, height=900");
    }
</script>
<?php
if (isset($_POST["recherche"])) {

    $search = $_POST["search"];
    //1) Connexion deja etablie
    //2) requete de selection de livres
    $connect = mysqli_connect('localhost', 'root', '', 'LEVETOT') or die("Erreur de connexion");
    $reqlivre = mysqli_query($connect, "select * from he_achat where code like '$search%' or dateachat  like '$search%' or prixachat like '$search%'") or die("Erreur de requete SQL");
    //3)Affichage des resultats
    $stotal = 0;
    $tps = 0;
    $tvq = 0;
    $total = 0;
    echo "<table border='1'><tr> <th> No achat </th> <th> No client </th> <th> Code </th> <th> Date </th> <th> Quantite </th> <th> Prix </th>  </tr>";

    while ($reqresultlivre = mysqli_fetch_row($reqlivre)) {
        $noachat = $reqresultlivre[0];
        $noclient = $reqresultlivre[1];
        $code = $reqresultlivre[2];
        $dateachat = $reqresultlivre[3];
        $prixachat = $reqresultlivre[4];
        $quantite = $reqresultlivre[5];
        $stotal += $prixachat;
        echo "<tr><td>$noachat </td><td>$noclient </td><td> $code</td>
		<td> $dateachat </td> <td>$quantite</td>  <td>$prixachat</td> </tr>";
    }
    $tps = $stotal * 0.05;
    $tvq = $stotal * 0.975;
    $total = $stotal + $tps + $tvq;
    echo "<tr><td colspan='5' align='right'>Sous Total: $stotal $ </td> </tr>
		<tr><td colspan='5' align='right'>TPS: $tps $</td> </tr>
		<tr><td colspan='5' align='right'>TVQ: $tvq $</td> </tr>
		<tr><td colspan='5' align='right'>TOTAL: $total $</td> </tr>
	</table>";
    /****************  Section Ouvrir le fichier a imprimer dans une nouvelle fenetre *******************/
}
?>