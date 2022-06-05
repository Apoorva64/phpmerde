<?php
    /*
    Author: Javed Ur Rehman
    Website: https://www.allphptricks.com
    */

    // Enter your Host, username, password, database below.
    // I left password empty because i do not set password on localhost.
    $con = mysqli_connect($_SESSION['db'], $_SESSION['db_username'], $_SESSION['db_password'], 'musee') or die ("Erreur de connexion");

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        die();
    }
?>
