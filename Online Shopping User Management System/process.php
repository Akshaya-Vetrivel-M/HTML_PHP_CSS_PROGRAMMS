<?php

session_start();


$username = "";
$product = "";

$errorMessage = "";

$cart = array();

$history = array();


/* Get form values */

if (isset($_POST["username"])) {

    $username = trim($_POST["username"]);

}

if (isset($_POST["product"])) {

    $product = trim($_POST["product"]);

}


/* Validate customer name */

if ($username == "") {

    $errorMessage = "Customer name cannot be empty.";

}


/* Validate product */

elseif ($product == "") {

    $errorMessage = "Please select a product.";

}


/* Process shopping information */

else {

    /*
     * Store customer name in session.
     */

    $_SESSION["username"] = $username;


    /*
     * Create shopping cart if it does not exist.
     */

    if (!isset($_SESSION["cart"])) {

        $_SESSION["cart"] = array();

    }


    /*
     * Add product to cart.
     */

    $_SESSION["cart"][] = $product;


    /*
     * Create browsing history if it does not exist.
     */

    if (!isset($_SESSION["history"])) {

        $_SESSION["history"] = array();

    }


    /*
     * Add product to browsing history.
     */

    $_SESSION["history"][] = $product;


    /*
     * Store login status using a cookie.
     */

    setcookie(
        "shopping_user",
        $username,
        time() + (24 * 60 * 60),
        "/"
    );


    /*
     * Store login status.
     */

    $_SESSION["logged_in"] = true;


    $cart = $_SESSION["cart"];

    $history = $_SESSION["history"];


    $successMessage =
        "Shopping information has been updated successfully.";

}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Shopping User Report</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

    <div class="result-card">

        <h1>Shopping User Report</h1>

        <?php

        if ($errorMessage != "") {

        ?>

            <div class="error-message">

                <h2>Input Error</h2>

                <p>
                    <?php
                    echo htmlspecialchars($errorMessage);
                    ?>
                </p>

            </div>

        <?php

        } else {

        ?>

            <div class="success-message">

                <h2>Shopping Session Updated</h2>

                <p>
                    <?php
                    echo htmlspecialchars($successMessage);
                    ?>
                </p>

            </div>


            <div class="summary-box">

                <h3>Customer Name</h3>

                <p>
                    <?php
                    echo htmlspecialchars($username);
                    ?>
                </p>

            </div>


            <div class="summary-box">

                <h3>Login Status</h3>

                <p>
                    Logged In
                </p>

            </div>


            <div class="summary-box">

                <h3>Latest Product</h3>

                <p>
                    <?php
                    echo htmlspecialchars($product);
                    ?>
                </p>

            </div>


            <div class="shopping-box">

                <h2>Shopping Cart</h2>

                <?php

                foreach ($cart as $item) {

                ?>

                    <div class="item">

                        <?php
                        echo htmlspecialchars($item);
                        ?>

                    </div>

                <?php

                }

                ?>

            </div>


            <div class="shopping-box">

                <h2>Browsing History</h2>

                <?php

                foreach ($history as $item) {

                ?>

                    <div class="item">

                        <?php
                        echo htmlspecialchars($item);
                        ?>

                    </div>

                <?php

                }

                ?>

            </div>

        <?php

        }

        ?>


        <a href="index.php" class="back-button">
            &lt;- Continue Shopping
        </a>

    </div>

</div>

</body>

</html>