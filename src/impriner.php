<script>
    window.print();
</script>

<h3> Formulaire de recherche de client...</h3>
<form method="post">
    <input type="text" name="coderecheche" value="">
    <input type="submit" name="recherche" value="Rechercher...">
</form>
<?php

    $conn = mysqli_connect('localhost', 'root', '', 'LEVETOT') or die ("Erreur de connexion");
    if (isset($_POST["recherche"])) {
        $coderecheche = $_POST["coderecheche"];

        $reqrecherche = mysqli_query($conn, "select * from he_achat
                                where noachat='$coderecheche'");

        $nbre = mysqli_num_rows($reqrecherche);
        if ($nbre > 0) {
            echo "<h3>Liste de client trouv&eacute;!</h3>";
            echo "<table border=2>

        <tr><th>idrecettes </th><th>Nom </th><th>Prenom </th>
        <th>cout </th> <th>Ingredients </th></tr>";

            while ($reqresultlivre = mysqli_fetch_row($reqrecherche)) {
                $noachat = $reqresultlivre[0];
                $noclient = $reqresultlivre[1];
                $code = $reqresultlivre[2];
                $dateachat = $reqresultlivre[3];
                $prixachat = $reqresultlivre[4];
                $quantite = $reqresultlivre[5];

                echo "<tr><td>$idrecettes </td> <td>$nom </td> <td>$ingredients </td>
            <td>$cout </td> <td><img src='photo/$photo' style='height:100px;width:200px'></img> </td> </tr>";
            }


        } else {
            echo "Aucun client trouv&eacute;!";
        }
    }
?>
