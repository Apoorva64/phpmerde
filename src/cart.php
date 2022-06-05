
<?php
    if(session_id() == '' || !isset($_SESSION) || session_status() === PHP_SESSION_NONE) {
        // session isn't started
        session_start();
    }
?>

<script type="text/javascript">
    function imprimer(page) {
        window.open(page, "Impression", "menubar=no, status=no, scrollbars=no, menubar=no, width=900, height=900");
    }
</script>

<?php



    $status = "";
    if (isset($_POST['action']) && $_POST['action'] == "remove") {

        foreach ($_SESSION["shopping_cart"] as $key => $value) {
            if ($_POST['code'] == $key) {
                unset($_SESSION["shopping_cart"][$key]);
                $status = "<div class='box' style='color:red;'>
		Product is removed from your cart!</div>";
            }
            if (empty($_SESSION["shopping_cart"]))
                unset($_SESSION["shopping_cart"]);
        }

    }

    if (isset($_POST['action']) && $_POST['action'] == "change") {
        foreach ($_SESSION["shopping_cart"] as &$value) {
            if ($value['code'] === $_POST["code"]) {
                $value['quantity'] = $_POST["quantity"];
                break; // Stop the loop after we've found the product
            }
        }

    }
?>
<html>
    <head>
        <title> Panier </title>
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
        <div style="width:700px; margin:50 auto;">
            <nav class="menu">
                <ul>
                    <ul>
                        <li><a href="acheterprod.php?lien=location"> voir les voitures </a></li>
                        <li><a href="cart.php?lien=modifier"> Mes favoris </a></li>
                        <li><a href="confirmachat.php?lien=Deconnexion"> catégories </a></li>
                        <li><a href="index.php?lien=Deconnexion"> Deconnexion </a></li>
                    </ul>
            </nav>
            <h2> Voila Vos Produits </h2>

            <?php
                if (!empty($_SESSION["shopping_cart"])) {
                    $cart_count = count(array_keys($_SESSION["shopping_cart"]));
                    ?>
                    <div class="cart_div">
                        <a href="cart.php">
                            <img src="cart-icon.png"/> Cart
                            <span><?php echo $cart_count; ?></span></a>
                    </div>
                    <?php
                }
            ?>

            <div class="cart">
                <?php
                    if (isset($_SESSION["shopping_cart"])) {
                        $total_price = 0;
                        ?>
                        <table class="table">
                            <tbody>
                                <tr>

                                    <td>ITEM NAME</td>
                                    <td>QUANTITY</td>
                                    <td>UNIT PRICE</td>
                                    <td>ITEMS TOTAL</td>
                                </tr>
                                <?php
                                    foreach ($_SESSION["shopping_cart"] as $product) {
                                        ?>
                                        <tr>

                                            <td><?php echo $product["nomprod"]; ?><br/>
                                                <form method='post' action=''>
                                                    <input type='hidden' name='code'
                                                           value="<?php echo $product["code"]; ?>"/>
                                                    <input type='hidden' name='action' value="remove"/>
                                                    <button type='submit' class='remove'>Remove Item</button>
                                                    <br>
                                                    <a href="confirmachat.php"> Confirm Item </a>


                                                </form>
                                            </td>
                                            <td>
                                                <form method='post' action=''>
                                                    <input type='hidden' name='code'
                                                           value="<?php echo $product["code"]; ?>"/>
                                                    <input type='hidden' name='action' value="change"/>
                                                    <select name='quantity' class='quantity'
                                                            onchange="this.form.submit()">
                                                        <option <?php if ($product["quantity"] == 1) echo "selected"; ?>
                                                                value="1">1
                                                        </option>
                                                        <option <?php if ($product["quantity"] == 2) echo "selected"; ?>
                                                                value="2">2
                                                        </option>
                                                        <option <?php if ($product["quantity"] == 3) echo "selected"; ?>
                                                                value="3">3
                                                        </option>
                                                        <option <?php if ($product["quantity"] == 4) echo "selected"; ?>
                                                                value="4">4
                                                        </option>
                                                        <option <?php if ($product["quantity"] == 5) echo "selected"; ?>
                                                                value="5">5
                                                        </option>
                                                    </select>
                                                </form>
                                            </td>
                                            <td><?php echo "$" . $product["prix"]; ?></td>
                                            <td><?php echo "$" . $product["prix"] * $product["quantity"]; ?></td>
                                        </tr>
                                        <?php
                                        $tps = 0.05;
                                        $tvq = 0.975;
                                        $total_price = ($product["prix"] * $product["quantity"] + $tps + $tvq);
                                    }
                                ?>
                                <tr>
                                    <td colspan="5" align="right">

                                        <strong>TOTAL: <?php echo "$" . $total_price; ?></strong>
                                        </strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <?php
                    } else {
                        echo "<h3>Your cart is empty!</h3>";
                    }
                ?>
            </div>

            <div style="clear:both;"></div>

            <div class="message_box" style="margin:10px 0px;">
                <?php echo $status; ?>
            </div>


            <br/><br/>

    </body>
</html>
