<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>َAnimated Login Form</title>
        <style>
            body {
                margin: 0;
                padding: 0;
                font-family: sans-serif;
                background-color: url("photo/back.jpg");
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
                padding: 7px
                border: none;
                font-size: 15px;
                width: 350px;
                font-family: sans-serif;
                white-space: nowrap;

            }

            .box {
                margin-top: 40px;

                width: 300px;
                padding: 40px;
                position: absolute;
                top: 52%;
                left: 50%;
                transform: translate(-50%, -50%);
                background: black;
                text-align: center;
                border-top-right-radius: 30px;
                border-top-left-radius: 30px;
                border-bottom-right-radius: 30px;
                border-bottom-left-radius: 30px;
            }

            .box h1 {
                color: white;
                text-transform: uppercase;
                font-weight: 500;
            }

            .box input[type = "text"], .box input[type = "password"] {
                border: 0;
                background: none;
                display: block;
                margin: 20px auto;
                text-align: center;
                border: 2px solid #3498db;
                padding: 14px 10px;
                width: 200px;
                outline: none;
                color: white;
                border-radius: 24px;
                transition: 0.25s;
            }

            .box input[type = "text"]:focus, .box input[type = "password"]:focus {
                width: 280px;
                border-color: #2ecc71;
            }

            .box input[type = "submit"] {
                border: 0;
                background: none;
                display: block;
                margin: 20px auto;
                text-align: center;
                border: 2px solid #2ecc71;
                padding: 14px 40px;
                outline: none;
                color: white;
                border-radius: 24px;
                transition: 0.25s;
                cursor: pointer;
            }

            .box input[type = "submit"]:hover {
                background: #2ecc71;
            }

            body {
                background-image: url("photo/background.jpg");
                /* Full height */
                height: 700px;

                /* Center and scale the image nicely */
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;


            }

        </style>
    </head>
    <body>
        <nav class="menu">
            <ul>
                <li><a href="index.php?lien=index"> Acceuil </a></li>
                <li><a href="login.php?lien=login"> Login </a></li>
                <li><a href="rechercheindex.php?lien=rechercheindex"> Search </a></li>
            </ul>


        </nav>

        <form class="box" method="post">
            <h1>Admin</h1>
            <input type="text" name="loginA" placeholder="Pseudo">
            <input type="password" name="passwordA" placeholder="password">
            <input type="submit" name="entrerA" value="Login">

            <h1>Membre</h1>
            <input type="text" name="login" placeholder="Pseudo">
            <input type="password" name="password" placeholder="Password">
            <input type="submit" name="entrer" value="Login">
            <center>
                <a href="nonmembre.php"> Inscription </a>
            </center>


        </form>


    </body>
</html>


<?php
    if (!isset($_SESSION)) {
        session_start();
    }


    function test_input($data)
    {

        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $conn = mysqli_connect('localhost', 'root', '', 'musee') or die ("Erreur de connexion");
    if (isset($_POST['entrerA'])) {
        $login = test_input($_POST['loginA']);
        $password = $_POST['passwordA'];

        $req = mysqli_query($conn, "SELECT*FROM admin WHERE login='$login' and password='$password'");
        $nbreadmin = mysqli_num_rows($req);
        $ligne = mysqli_fetch_row($req);

        if ($nbreadmin == 1) {
            $_SESSION["login"] = $ligne[0];
            $_SESSION["password"] = $ligne[1];
            echo '<script>window.location.href="indexadmin.php";</script>';
        } else {
            echo "Login ou Password incorrecte";
        }

    } elseif (isset($_POST["entrer"])) {
        $loginmembre = test_input($_POST["login"]);
        $passwordmembre = $_POST["password"];
        $_SESSION["login"] = $loginmembre;


        $connect = mysqli_connect('localhost', 'root', '', 'musee') or die ("Erreur de connexion");
        $reqmembre = mysqli_query($connect, "SELECT * from visiteurs where pseudo='$loginmembre' and password='$passwordmembre'");
        $nbremembre = mysqli_num_rows($reqmembre);
        $ligne = mysqli_fetch_row($reqmembre);
        if ($nbremembre == 1) {

            $_SESSION["noclient"] = $ligne[0];
            $_SESSION["nomfour"] = $ligne[1];
            $_SESSION["telephone"] = $ligne[2];
            $_SESSION["email"] = $ligne[3];
            $_SESSION["password"] = $ligne[4];

            echo '<script>window.location.href="acheterprod.php";</script>';

        } else {
            echo "Login ou Password incorrecte";
        }
    }
?>
