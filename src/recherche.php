<?php
    //1) recuperation de la valeur recherchee
    $recherche = $_REQUEST["recherche"];
    //2) connexion avec la base
    include("connexion.php");
    //3)requete de recherche
    $reqsearch = mysqli_query($connect, "SELECT * from he_produit where code like '$recherche%'");
    //4) Analyse et affichage des resultats de la recherche
    $nbresearch = mysqli_affected_rows($connect);
    if ($nbresearch > 0) {
        echo "<table border='1'> <th> Code </th> <th> Nom Produit </th> <th> Photo </th>";

        while ($resultat = mysqli_fetch_row($reqsearch)) {
            echo "<tr><td> $resultat[0] </td> <td> $resultat[1]</td> <td><img src='photo/$resultat[4]' style='height:100px;width:150px'></img></td></tr>";
        }

        echo "</table>";
    } else {
        echo "Aucun resultat trouve!";
    }
?>
