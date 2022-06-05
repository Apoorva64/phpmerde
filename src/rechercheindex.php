<head>
    <!--script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"> </script -->

    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
</head>
<style>
    #formsearch {

        margin-left: 810px;
        position: absolute;
        margin-top: 150px;
    }

    #contenu {
        position: absolute;
        margin-top: 200px;
        margin-left: 810px;
    }
</style>
<center>
    <ul>

    </ul>
    <!-- formulaire de recherche -->
    <form id="formsearch">
        <input id="search" name="recherche">
    </form>

    <div id="contenu">
        <script type="text/javascript">
            $("#contenu").html("<font color='white'> Bienvenue </font>");
        </script>
    </div>
    <div id="resultat">

    </div>
</center>

<script type="text/javascript" src="js/fonctionsJquery.js"></script>
<body>

    <style>
        body {
            margin: 0;

            background-image: url("photo/background.jpg");
            /* Full height */
            height: 700px;

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
            padding: 7px
            border: none;
            font-size: 15px;
            width: 350px;
            font-family: sans-serif;
            white-space: nowrap;

        }

        button {
            float: right;
            margin-right: auto;
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
            background-color: #silver;
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
            <li><a href="index.php?lien=index"> Acceuil </a></li>
            <li><a href="login.php?lien=login"> Login </a></li>
            <li><a href="rechercheindex.php?lien=rechercheindex"> Search </a></li>

        </ul>
</body>
