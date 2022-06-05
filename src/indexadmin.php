<style>
    body {
        margin: 0;
        padding: 0;
        font-family: sans-serif;
        background-image: url("photo/background.jpg");
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

            <li><a href="modifierVoiture.php?lien=modifier"> Edit </a></li>
            <li><a href="nosproduits.php?lien=nosproduits"> Nos voitures </a></li>
            <li><a href="ajoutproduits.php?lien=ajoutproduits"> Ajout voiture </a></li>
            <li><a href="index.php?lien=Deconnexion"> Deconnexion </a></li>
        </ul>


    </nav>


</body>
