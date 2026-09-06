<?php

session_start();

if (isset($_POST["visitor_name"])) {

    $visitor_name = $_POST["visitor_name"];

    if (!isset($_SESSION["visit_count"])) {
        $_SESSION["visit_count"] = 1;
    } else {
        $_SESSION["visit_count"]++;
    }

    $_SESSION["visitor_name"] = $visitor_name;

} else {
    header("Location: index.php");
    exit();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Visitor Session Details</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

    <h1>Visitor Session Details</h1>

    <div class="result-box">

        <p>
            <strong>Visitor Name:</strong>
            <?php echo htmlspecialchars($_SESSION["visitor_name"]); ?>
        </p>

        <p>
            <strong>Session ID:</strong>
            <?php echo session_id(); ?>
        </p>

        <p>
            <strong>Visit Count:</strong>
            <?php echo $_SESSION["visit_count"]; ?>
        </p>

        <p>
            <strong>Current Time:</strong>
            <?php echo date("Y-m-d H:i:s"); ?>
        </p>

    </div>

    <a href="index.php" class="button">Back</a>

</div>

</body>
</html>