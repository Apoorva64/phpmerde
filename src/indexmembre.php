<style>
    body {
        margin: 0;
        padding: 0;
        font-family: sans-serif;
        background-image: url("photo/back.jpg");
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
            <li><a href="acheterprod.php?lien=location"> voir les voitures </a></li>
            <li><a href="cart.php?lien=modifier"> Mes favoris </a></li>
            <li><a href="confirmachat.php?lien=Deconnexion"> catégories </a></li>
            <li><a href="index.php?lien=Deconnexion"> Deconnexion </a></li>

        </ul>


    </nav>


</body>
