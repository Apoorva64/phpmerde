<?php
    if (session_id() == '' || !isset($_SESSION) || session_status() === PHP_SESSION_NONE) {
        // session isn't started
        session_start();
    }
?>
<style>
    th {
        color: white;
        background: black;
    }

    td {
        color: white;
        background: black;

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

    .edit {
        position: absolute;
        margin-top: 200px;
        margin-left: 0px;
    }

    .edit2 {
        position: absolute;
        margin-top: 250px;
        margin-left: 0px;
    }

    .edit3 {
        position: absolute;
        margin-top: 500px;
        margin-left: 700px;
    }

</style>
<body>

    <nav class="menu">
        <ul>

            <li><a href="modifierVoiture.php?lien=modifier"> Edit </a></li>
            <li><a href="nosproduits.php?lien=nosproduits"> Nos voitures </a></li>
            <li><a href="ajoutproduits.php?lien=ajoutproduits"> Ajout voitures </a></li>
            <li><a href="index.php?lien=Deconnexion"> Deconnexion </a></li>
        </ul>

    </nav>
    <form method="post">
        <div class="edit">
            <table border="2">
                <tr>
                    <td> New Email</td>
                    <td><input type="text" name="newemail" value=""></td>
                </tr>
                <tr>
                    <td> New Tel</td>
                    <td><input type="text" name="newtel" value=""></td>
                </tr>
                <tr>
                    <td> Old Password</td>
                    <td><input type="password" name="oldpasswd" value=""></td>
                </tr>
                <tr>
                    <td> New Password</td>
                    <td><input type="password" name="newpasswd" value=""></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="update" value="Update"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="updateE" value="UpdateE"></td>
                </tr>
            </table>

        </div>

        <div class="edit3">
            <table border="2">
                <tr>
                    <td> No client</td>
                    <td><input type="text" name="noclient" value=""></td>
                </tr>
                <tr>
                    <td> NomFour</td>
                    <td><input type="text" name="nomfour" value=""></td>
                </tr>
                <tr>
                    <td> Telephone</td>
                    <td><input type="text" name="telephone" value=""></td>
                </tr>
                <tr>
                    <td> Email</td>
                    <td><input type="text" name="email" value=""></td>
                </tr>
                <tr>
                    <td> Password</td>
                    <td><input type="password" name="password" value=""></td>
                </tr>
            </table>
            <tr>
                <td></td>
                <td><input type="submit" name="insert" value="Insert"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="delete" value="Delete"></td>
            </tr>

        </div>
        <?php
            $connect = mysqli_connect($_SESSION['db'], $_SESSION['db_username'], $_SESSION['db_password'], 'musee') or die ("Erreur de connexion");
            if (isset($_POST["insert"])) {
                $noclient = ($_POST['noclient']);
                $nomfour = ($_POST['nomfour']);
                $telephone = ($_POST['telephone']);
                $email = ($_POST['email']);
                $password = ($_POST['password']);
                $insertion = mysqli_query($connect, "insert into visiteurs VALUES
('$noclient','$nomfour','$telephone','$email','$password')") or die ("Erreur d'insertion");
            }

        ?>
        <div class="edit2">
            <?php

                $prenom1 = $_SESSION["nomfour"];

            ?>
            <form method="post">
                <?php
                    $conn = mysqli_connect($_SESSION['db'], $_SESSION['db_username'], $_SESSION['db_password'], 'musee') or die ("Erreur de connexion");

                    $reqaffich = mysqli_query($conn, "SELECT * FROM visiteurs") or die ("Erreur de selection");

                    echo "<table border=2px width=60%>  <th> </th> <th> Nom </th>  <th> Email </th> <th> Telephone </th> <th> Password </th>";

                    while ($result = mysqli_fetch_row($reqaffich)) {
                        $noclient = $result[0];
                        $nomfour = $result[1];
                        $email = $result [3];
                        $telephone = $result[2];
                        $password = $result[4];

                        echo "<tr> <td> <input type='checkbox' name='checkbox[]' value='$noclient'> </td> <td>$nomfour</td> <td>$email</td> <td>$telephone</td>  <td>$password</td> </tr>";
                    }
                    echo "</table>";

                    if (isset($_POST['delete'])) {
                        $check = $_POST['checkbox'];
                        foreach ($check as $noclient) {
                            mysqli_query($connect, "Delete from visiteurs Where pseudo =" . $noclient);
                        }
                    }

                ?>
            </form>
            <?php if (isset($_POST["update"])) {
                $ancienpass = $_POST["oldpasswd"];

                // Stocker le mdp du membre dans la variable $passwordbda
                $resultat = mysqli_query($conn, "SELECT * FROM visiteurs WHERE nom= '$prenom1'");

                $ligne = mysqli_fetch_row($resultat);
                $password = $ligne[4];

                if ($password == $ancienpass) {
                    $newpass = $_POST["newpasswd"];

                    $select = mysqli_query($conn, "Update visiteurs set password='$newpass' where nom='$prenom1'")
                    or die ("Erreur de modification");


                    $nbre = mysqli_affected_rows($conn);
                    if ($nbre > 0) {
                        echo "La modification du mot de passe de " . $prenom1 . " a ete effectuer";
                    } else {
                        echo "Echec de mise a jour.";
                    }

                    //Les meme mdp doivent pas etre entrees
                    if ($newpass == $password) {
                        echo "Le nouveau mot de passe doit etre different de l'ancien";
                    }
                } else {
                    echo "Ce n'est pas votre ancien mot de passe";
                }
            }
            ?>
            <?php


                if (isset($_POST["update"])) {
                    $newemail = $_POST["newemail"];
                    $selectt = mysqli_query($conn, "Update visiteurs set email='$newemail' where nom='$prenom1'")
                    or die ("Erreur de modification");
                    echo "modifier avec Succes";
                }
            ?>
            <?php if (isset($_POST["update"])) {
                $newtelephone = $_POST["newtel"];
                $selecttt = mysqli_query($conn, "Update visiteurs set telephone='$newtelephone' where nom='$prenom1'")
                or die ("Erreur de modification");
                echo "modifier avec Succes";
            } ?>
            <br><br>
            <input type="submit" name="deleteA" value="Delete">
            <?php

                $connect = mysqli_connect($_SESSION['db'], $_SESSION['db_username'], $_SESSION['db_password'], 'musee') or die ("Erreur de connexion");

                $reqlivre = mysqli_query($connect, "select * from visiteurs") or die("Erreur de requete SQL");
                //3)Affichage des resultats
                $stotal = 0;
                $tps = 0;
                $tvq = 0;
                $total = 0;

                /****************  Section Ouvrir le fichier a imprimer dans une nouvelle fenetre *******************/
                if (isset($_POST['deleteA'])) {
                    $check = $_POST['checkbox'];
                    foreach ($check as $noclient) {
                        mysqli_query($connect, "Delete from visiteurs Where nom =" . $noachat);
                    }
                }


            ?>
        </div>
    </form>
</body>
