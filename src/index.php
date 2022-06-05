<?php
    if(session_id() == '' || !isset($_SESSION) || session_status() === PHP_SESSION_NONE) {
        // session isn't started
        session_start();
    }


    $_SESSION['db'] = 'db';
    $_SESSION['db_password'] = 'my_secret_password';
    $_SESSION['db_username'] = 'root';
    $_SESSION['db_name']= 'musee';
    $conn = mysqli_connect($_SESSION['db'], $_SESSION['db_username'], $_SESSION['db_password'], 'musee') or die ("Erreur de connexion");


    ?>


<!DOCTYPE html>
<html>
    <head>
        <title> Bienvenue sur la page d'acceuil </title>
        <style>

            body {
                background-image: url("photo/back.jpg");
                margin: 0;
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


            #first {
                width: 300px;
                padding: 20px;
                position: absolute;
                top: 58%;
                left: 20%;
                transform: translate(-50%, -50%);
                background: silver;
                text-align: center;
                border-top-right-radius: 30px;
                border-top-left-radius: 30px;
                border-bottom-right-radius: 30px;
                border-bottom-left-radius: 30px;
                border: solid grey;
            }

            #second {
                width: 300px;
                padding: 20px;
                position: absolute;
                top: 58%;
                left: 50%;
                transform: translate(-50%, -50%);
                background: silver;
                text-align: center;
                border-top-right-radius: 30px;
                border-top-left-radius: 30px;
                border-bottom-right-radius: 30px;
                border-bottom-left-radius: 30px;
                border: solid grey;
            }

            #third {
                width: 300px;
                padding: 20px;
                position: absolute;
                top: 58%;
                left: 80%;
                transform: translate(-50%, -50%);
                background: silver;
                text-align: center;
                border-top-right-radius: 30px;
                border-top-left-radius: 30px;
                border-bottom-right-radius: 30px;
                border-bottom-left-radius: 30px;
                border: solid grey;
            }

            img {
                border-radius: 80px;
                border: solid black;
            }

            .button {
                border-radius: 4px;
                background-color: silver;
                border: none;
                color: black;
                text-align: center;
                font-size: 20px;
                padding: 10px;
                width: 200px;
                transition: all 0.5s;
                cursor: pointer;
                margin-right: 50px;
            }

            .button span {
                cursor: pointer;
                display: inline-block;
                position: relative;
                transition: 0.5s;
            }

            .button span:after {
                content: '\00bb';
                position: absolute;
                opacity: 0;
                top: 0;
                right: -20px;
                transition: 0.5s;
            }

            .button:hover span {
                padding-right: 20px;
            }

            .button:hover span:after {
                opacity: 1;
                right: 0;
            }


        </style>
    <body>
        <nav class="menu">
            <ul>
                <li><a href="index.php?lien=index"> Acceuil </a></li>
                <li><a href="login.php?lien=login"> Login </a></li>
                <li><a href="rechercheindex.php?lien=chercher"> Search </a></li>

            </ul>


        </nav>
        <form method="post">
            <center><br><br><br><br>
                <style> h1 {
                        color: white;

                    }

                    center {
                        background-image: url("photo/background.jpg");
                        /* Full height */
                        height: 700px;

                        /* Center and scale the image nicely */
                        background-position: center;
                        background-repeat: no-repeat;
                        background-size: cover;


                    }
                </style>
                <h1><i> Bienvenue Sur Le Site de votre musée de voiture de collection </i></h1>
                <?php
                	$request = mysqli_query($conn, "SELECT DISTINCT marque FROM oeuvres");
                    foreach($request as $marque){
                        $marque=$marque["marque"];
                        $request2 = mysqli_query($conn, "SELECT * FROM oeuvres WHERE marque='$marque' ORDER BY prix LIMIT 1");
                        foreach ($request2 as $bestcar) {
                            // $bestcar=$bestcar["marque"];
                            echo "<p>";
                            echo "<a href='affichermarque.php?marque=$marque'>$marque</a>";
                            echo "<br/>";
                            // print_r($bestcar);
                            echo "<img src='{$bestcar["photo"]}' alt='photo d/'une $marque'>";
                            echo "</p>";

                        }
                        // print_r($request2);
                    }
                    ?>
            </center>



    </body>
</html>

<?php


    if (isset($_REQUEST["lien"])) {
        $lien = $_REQUEST["lien"];
        //selon le lien cliquer
        switch ($lien) {
            case"acceuil":
                include("index.php");
                break;
            case"login":
                include("login.php");
                break;
            case"nos auto":
                include("nosauto.php");
                break;
            case"about":
                include("about.php");
                break;
            case"contact":
                include("contact.php");
                break;
        }
    }
?>
