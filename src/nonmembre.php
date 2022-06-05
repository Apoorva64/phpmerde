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

    .box {
        width: 300px;
        padding: 40px;
        position: absolute;
        top: 52%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: #191919;
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
</style>

<body>
    <nav class="menu">
        <ul>
            <li><a href="index.php?lien=index"> Acceuil </a></li>
            <li><a href="login.php?lien=login"> Login </a></li>
            <li><a href="recherche.php?lien=chercher"> Search </a></li>
        </ul>

        <form class="search-form">
            <input type="text" placeholder="search">
            <button> search</button>
        </form>
    </nav>
    <form class="box" method="post">
        <h1>Inscription</h1>
        <input type="text" name="nomfour" placeholder="Nom">
        <input type="text" name="telephone" placeholder="Telephone">
        <input type="text" name="email" placeholder="Email">
        <input type="password" name="passwordM" placeholder="passwordM">
        <input type="submit" name="entrermembre" value="Inscription">
    </form>
</body>


<?php

    if (isset($_POST["entrermembre"])) {

        $nomfour = ($_POST['nomfour']);
        $tel = ($_POST['telephone']);
        $email = ($_POST['email']);
        $passwdord = ($_POST['passwordM']);

        $noclient = substr($nomfour, 0, 3) . substr($tel, 0, 2);

        if ($nomfour == '') {
            echo "Veuillez entrer un nom";
        } else if ($tel == '') {
            echo "Veuillez entrer un telephone";
        } else if ($email == '') {
            echo "Veuillez entrer une email";
        } else if ($passwdord == '') {
            echo "Veuillez entrer un mot de passe";
        } else {
            $conn = mysqli_connect('localhost', 'root', '', 'musee') or die ("Erreur de connexion");
            $insertion = mysqli_query($conn, "insert into visiteurs VALUES
('$noclient','$nomfour','$tel','$email','$passwdord')") or die ("Erreur d'insertion");

            $nbre = mysqli_affected_rows($conn);
            if ($nbre > 0) {

                echo "L'insertion de $nomfour  a ete effectuer";

            } else {
                echo "Pas marcher";
            }
        }
    }

?>
