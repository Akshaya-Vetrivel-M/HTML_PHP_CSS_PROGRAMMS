<?php

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: index.php");
    exit();
}

$customerName = isset($_POST["customer_name"])
    ? trim($_POST["customer_name"])
    : "";

$preference = isset($_POST["preference"])
    ? trim($_POST["preference"])
    : "";

$errorMessage = "";
$successMessage = "";
$visitCount = 0;

if ($customerName == "") {

    $errorMessage = "Customer name cannot be empty.";

} elseif ($preference == "") {

    $errorMessage = "Please select a preferred category.";

} else {

    if (isset($_COOKIE["visit_count"])) {
        $visitCount = (int) $_COOKIE["visit_count"];
    }

    $visitCount = $visitCount + 1;

    setcookie(
        "visit_count",
        $visitCount,
        time() + (30 * 24 * 60 * 60),
        "/"
    );

    setcookie(
        "customer_name",
        $customerName,
        time() + (30 * 24 * 60 * 60),
        "/"
    );

    setcookie(
        "customer_preference",
        $preference,
        time() + (30 * 24 * 60 * 60),
        "/"
    );

    $successMessage = "Your preferences have been saved successfully.";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Customer Visit Report</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

    <div class="result-card">

        <h1>Customer Visit Report</h1>

        <?php if ($errorMessage != "") { ?>

            <div class="error-message">

                <h2>Input Error</h2>

                <p>
                    <?php echo htmlspecialchars($errorMessage); ?>
                </p>

            </div>

        <?php } else { ?>

            <div class="success-message">

                <h2>
                    Welcome,
                    <?php echo htmlspecialchars($customerName); ?>!
                </h2>

                <p>
                    <?php echo htmlspecialchars($successMessage); ?>
                </p>

            </div>

            <div class="summary-box">

                <h3>Customer Name</h3>

                <p>
                    <?php echo htmlspecialchars($customerName); ?>
                </p>

            </div>

            <div class="summary-box">

                <h3>Preferred Category</h3>

                <p>
                    <?php echo htmlspecialchars($preference); ?>
                </p>

            </div>

            <div class="summary-box">

                <h3>Total Visits</h3>

                <p>
                    <?php echo $visitCount; ?>
                </p>

            </div>

            <div class="visit-message">

                <?php if ($visitCount == 1) { ?>

                    <h2>Welcome to your first visit!</h2>

                    <p>
                        We are happy to have you here.
                    </p>

                <?php } else { ?>

                    <h2>Welcome Back!</h2>

                    <p>
                        This is your
                        <strong><?php echo $visitCount; ?></strong>
                        visit to our website.
                    </p>

                <?php } ?>

            </div>

        <?php } ?>

        <a href="index.php" class="back-button">
            &lt;- Visit Again
        </a>

    </div>

</div>

</body>

</html>