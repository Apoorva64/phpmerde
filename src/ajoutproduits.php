<?php
session_start();

?>

<style>
    h2 {
        color: white;

    }

    body {
        margin: 0;
        padding: 0;
        font-family: sans-serif;
        background-image: url("photo/background.jpg");
        /* Center and scale the image nicely */
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }

    th {
        color: white;
        background: black;
    }

    td {
        color: white;
        background: black;

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
            <li><a href="indexmembre.php?lien=location"> Mes voitures </a></li>
            <li><a href="modifier.php?lien=modifier"> Edit </a></li>
            <li><a href="nosproduits.php?lien=nosproduits"> Nos voitures </a></li>
            <li><a href="ajoutproduits.php?lien=ajoutproduits"> Ajout voiture </a></li>
            <li><a href="index.php?lien=Deconnexion"> Deconnexion </a></li>
        </ul>


    </nav>
</body>
<?php
    echo "   <h2>  Voila Nos Produits  ( Voici certaines Produits )   </h2> ";
    $connect =  mysqli_connect($_SESSION['db'], $_SESSION['db_username'], $_SESSION['db_password'], 'musee') or die ("Erreur de connexion");
?>
<?php
    echo "<form method='post'>";

    $req3recette = mysqli_query($connect, "SELECT * FROM oeuvres LIMIT 0,5") or die ("Erreur de selection");

    echo "<table border=4px width=50%> <th>Nom</th> <th>Description</th> <th>Prix</th> <th>Photo</th>";

    while ($reqresultat = mysqli_fetch_row($req3recette)) {
        $listenom = $reqresultat[1];
        $listeingred = $reqresultat[2];
        $listecout = $reqresultat[3];
        $listephoto = $reqresultat[4];

        echo "<tr> <td>$listenom</td> <td>$listeingred</td> <td>$listecout</td> <td><img src='photo/$listephoto' style='height:100px;width:150px'></img></td></tr>";
    }
    echo "</table> </form>";

?>
<nobr>

    <div id="ediit">

        <table>
            <tr>
                <td>

                    <form method="post">
                        <table border="2">


                            <tr>
                                <td>annee</td>
                                <td><input type='text' name="idrecettes" value=""></td>
                            </tr>
                            <tr>
                                <td>nom</td>
                                <td><input type="text" name="nom" value=""></td>
                            </tr>
                            <tr>
                                <td>preparation</td>
                                <td><input type="text" name="preparation" value=""></td>
                            </tr>
                            <tr>
                                <td>cout</td>
                                <td><input type="text" name="cout" value=""></td>
                            </tr>
                            <tr>
                                <td>Photo</td>
                                <td><input type="file" name="uploaded_file"></input></td>
                            </tr>

                            <tr>
                                <td>No client</td>
                                <td><input type="text" name="idmembre" value=""></td>
                            </tr>
                            <br><br><br>
                                <input type="submit" name="insert" value="insert">
                                <input type="submit" name="update" value="update">
                                <input type="submit" name="delete" value="delete">
                                </center>
    </div>
    <br>
    <?php
        $connect =  mysqli_connect($_SESSION['db'], $_SESSION['db_username'], $_SESSION['db_password'], 'musee') or die ("Erreur de connexion");
        if (isset($_POST["insert"])) {
            if (!empty($_FILES['uploaded_file'])) {
                $photo = $_FILES['uploaded_file']['name'];

                $reqinsert = mysqli_query($connect, "INSERT INTO visiteurs VALUES('$noclient','$nomfour','$telephone','$email','$password')") or die("Erreur de requete SQL!");

                $path = "photos/";
                $path = $path . basename($_FILES['uploaded_file']['name']);
                if (move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path)) {
                    echo "The file " . basename($_FILES['uploaded_file']['name']) .
                            " has been uploaded";
                } else {
                    echo "There was an error uploading the file, please try again!";
                }
            }

            $idrecettes = ($_POST['idrecettes']);
            $nomprod = ($_POST['nom']);
            $preparation = ($_POST['preparation']);
            $cout = ($_POST['cout']);
            $photo = ($_POST['uploaded_file']);
            $idmembre = ($_POST['idmembre']);
            $insertion = mysqli_query($connect, "insert into oeuvres (modele, marque, année, photo, prix) VALUES
     ('$nomprod','$preparation','$idrecettes','$photo','$cout')") or die ("Erreur d'insertion");
        }

    ?>
    <?php
        echo "<div id='edit'>";
        echo "<form method='post'>";

        $req3recette = mysqli_query($connect, "select * from oeuvres limit 0,5") or die ("Erreur de selection");

        echo "<table border=4px width=60%> <th></th> <th>Nom</th> <th>Ingredients</th> <th>Cout</th> <th>Photo</th>";
        while ($reqresultat = mysqli_fetch_row($req3recette)) {
            $listerecettes = $reqresultat[0];
            $listenom = $reqresultat[1];
            $listeingred = $reqresultat[2];
            $listecout = $reqresultat[3];
            $listephoto = $reqresultat[4];
            echo "<tr> <td> <input type='checkbox' name='checkbox[]' value='$listerecettes'> </td> <td>$listenom</td> <td>$listeingred</td> <td>$listecout</td> <td><img src='photo/$listephoto' style='height:100px;width:200px'></img></td></tr>";
        }
        if (isset($_POST['delete'])) {
            $check = $_POST['checkbox'];
            foreach ($check as $idrecettes) {
                mysqli_query($connect, "Delete from oeuvres Where id =" . $listerecettes);
            }
        }
        echo "</table> </form> </div>";
    ?>
</nobr> </form>  </nobr>
