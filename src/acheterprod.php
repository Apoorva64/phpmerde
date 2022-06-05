<?php
    /*
    Author: Javed Ur Rehman
    Website: https://www.allphptricks.com
    */
    if(session_id() == '' || !isset($_SESSION) || session_status() === PHP_SESSION_NONE) {
        // session isn't started
        session_start();
    }

    include('db.php');
    $status = "";
    if (isset($_POST['code']) && $_POST['code'] != "") {
        $code = $_POST['code'];
        $con = mysqli_connect($_SESSION['db'], $_SESSION['db_username'], $_SESSION['db_password'], 'musee') or die ("Erreur de connexion");
        $result = mysqli_query($con, "UPDATE oeuvres SET likes = likes + 1 WHERE id = '$code'");
//        $row = mysqli_fetch_assoc($result);
//        $modele = $row['modele'];
//        $code = $row['id'];
//        $annee = $row['annee'];
//        $photo = $row['photo'];
//
//        $cartArray = array(
//                $code => array(
//                        'modele' => $modele,
//                        'code' => $code,
//                        'annee' => $annee,
//                        'quantity' => 1,
//                        'photo' => $photo)
//        );


//        if (empty($_SESSION["shopping_cart"])) {
//            $_SESSION["shopping_cart"] = $cartArray;
//            $status = "<div class='box'>déja ajouté!</div>";
//        } else {
//            $array_keys = array_keys($_SESSION["shopping_cart"]);
//            if (in_array($code, $array_keys)) {
//                $status = "<div class='box' style='color:red;'>
//		voiture ajouté aux favoris!</div>";
//            } else {
//                $_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"], $cartArray);
//                $status = "<div class='box'>Product is added to your cart!</div>";
//            }
//
//        }
    }
?>
<html>
    <head>

        <title> Produit </title>
        <link rel='stylesheet' href='css/style.css' type='text/css' media='all'/>
    </head>
    <body>
        <style>
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
        <nav class="menu">
            <ul>
                <ul>
                    <li><a href="acheterprod.php?lien=location"> voir les voitures </a></li>
                    <li><a href="#"> Mes favoris </a></li>
                    <li><a href="confirmachat.php?lien=Deconnexion"> catégories </a></li>
                    <li><a href="index.php?lien=Deconnexion"> Deconnexion </a></li>

                </ul>

        </nav>
        <div style="width:700px; margin:50 auto;">


            <?php
                if (!empty($_SESSION["shopping_cart"])) {
                    $cart_count = count(array_keys($_SESSION["shopping_cart"]));
                    ?>

                    <?php
                }

                $result = mysqli_query($con, "SELECT * FROM `oeuvres`");
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<div class='product_wrapper' style='padding: 90px'>
			  <form method='post' action=''>
			  <input type='hidden' name='code' value=" . $row['id'] . " />
			  <img src='photo/" . $row['photo'] . "' style='height:100px;width:150px'/>
			  <div class='nomprod' style='color:white;'>" . $row['modele'] . "</div>
		   	  <div class='prix' style='color:white;'>" . $row['prix'] . "</div>
		   	  <div class='prix' style='color:white;'>likes:" . $row['likes'] . "</div>
			  <button type='submit' class='buy'>Like</button>
			  </form>
		   	  </div>";
                }
                mysqli_close($con);
            ?>

            <div style="clear:both;"></div>

            <div class="message_box" style="margin:10px 0px;">
                <?php echo $status; ?>
            </div>

            <br/><br/>

    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $("img").click(function () {
                this.requestFullscreen();
            });
        });
    </script>
</html>
