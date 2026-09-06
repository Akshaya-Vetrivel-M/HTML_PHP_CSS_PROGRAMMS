<?php

$previous_login = "";

if (isset($_COOKIE["last_login"])) {
    $previous_login = $_COOKIE["last_login"];
}

$current_login = date("Y-m-d H:i:s");

setcookie("last_login", $current_login, time() + (86400 * 30));

?>

<!DOCTYPE html>
<html>
<head>
    <title>User Last Login Tracking Using Cookies</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <h1>User Last Login Tracking</h1>

    <?php if ($previous_login != "") { ?>

        <div class="login-info">
            <h2>Welcome Back!</h2>
            <p>Your previous login was:</p>
            <strong><?php echo htmlspecialchars($previous_login); ?></strong>
        </div>

    <?php } else { ?>

        <div class="login-info">
            <h2>Welcome!</h2>
            <p>This is your first login.</p>
        </div>

    <?php } ?>

    <div class="current-login">
        <p>Current Login Time:</p>
        <strong><?php echo $current_login; ?></strong>
    </div>

</div>

</body>
</html>