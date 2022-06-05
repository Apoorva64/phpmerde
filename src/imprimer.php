<script>
    window.print();
</script>

<h3> Formulaire de recherche de client...</h3>
<form method="post">
    <input type="text" name="coderecheche" value="">
    <input type="submit" name="recherche" value="Rechercher...">
</form>
<?php

    $conn =  mysqli_connect($_SESSION['db'], $_SESSION['db_username'], $_SESSION['db_password'], 'musee') or die ("Erreur de connexion");
    if (isset($_POST["recherche"])) {
        $coderecheche = $_POST["coderecheche"];

        $reqrecherche = mysqli_query($conn, "select * from he_produit
                                where code='$coderecheche'
                                or nomprod='$coderecheche'
                                  or prix='$coderecheche'");

        $nbre = mysqli_num_rows($reqrecherche);
        if ($nbre > 0) {
            echo "<h3>Liste de client trouv&eacute;!</h3>";
            echo "<table border=2>

        <tr><th>idrecettes </th><th>Nom </th><th>Prenom </th>
        <th>cout </th> <th>Ingredients </th></tr>";

            while ($listetrouve = mysqli_fetch_row($reqrecherche)) {
                $idrecettes = $listetrouve[0];
                $nom = $listetrouve[1];
                $ingredients = $listetrouve[2];
                $cout = $listetrouve[5];
                $photo = $listetrouve[7];

                echo "<tr><td>$idrecettes </td> <td>$nom </td> <td>$ingredients </td>
            <td>$cout </td> <td><img src='photo/$photo' style='height:100px;width:200px'></img> </td> </tr>";
            }


        } else {
            echo "Aucun client trouv&eacute;!";
        }
    }
?>
