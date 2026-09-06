<?php

$username = "";
$password = "";
$errorMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST["username"])) {
        $username = trim($_POST["username"]);
    }

    if (isset($_POST["password"])) {
        $password = $_POST["password"];
    }

    if ($username == "") {

        $errorMessage = "Username is required.";

    } elseif ($password == "") {

        $errorMessage = "Password is required.";

    } elseif ($username == "admin" && $password == "12345") {

        header("Location: dashboard.php");
        exit();

    } else {

        $errorMessage = "Invalid username or password.";

    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login Result</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

    <div class="result-card">

        <h1>Login Result</h1>

        <div class="error-message">

            <h2>Login Failed</h2>

            <p>
                <?php
                echo htmlspecialchars($errorMessage);
                ?>
            </p>

        </div>

        <a href="index.php" class="back-button">
            &lt;- Try Again
        </a>

    </div>

</div>

</body>

</html>