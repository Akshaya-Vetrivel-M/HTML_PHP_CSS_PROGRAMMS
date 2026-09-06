<?php

if ($_SERVER["REQUEST_METHOD"] != "POST") {

    header("Location: index.php");

    exit();

}

$name = "";

$errorMessage = "";

if (isset($_POST["name"])) {

    $name = trim($_POST["name"]);

}

if ($name == "") {

    $errorMessage = "Please enter your name.";

}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Date and Time Report</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

    <div class="result-card">

        <h1>Date and Time Report</h1>

        <?php

        if ($errorMessage != "") {

        ?>

            <div class="error-message">

                <h2>Error</h2>

                <p>
                    <?php
                    echo htmlspecialchars($errorMessage);
                    ?>
                </p>

            </div>

        <?php

        } else {

            $currentDate = date("d-m-Y");

            $currentTime = date("h:i:s A");

            $dayName = date("l");

            $monthName = date("F");

            $year = date("Y");

            $fullDate = date("l, F d, Y");

        ?>

            <div class="success-message">

                <h2>Hello, <?php echo htmlspecialchars($name); ?>!</h2>

                <p>
                    Your date and time report has been generated successfully.
                </p>

            </div>


            <div class="date-box">

                <h3>Current Date</h3>

                <p>
                    <?php echo $currentDate; ?>
                </p>

            </div>


            <div class="date-box">

                <h3>Current Time</h3>

                <p>
                    <?php echo $currentTime; ?>
                </p>

            </div>


            <div class="date-box">

                <h3>Day</h3>

                <p>
                    <?php echo $dayName; ?>
                </p>

            </div>


            <div class="date-box">

                <h3>Month</h3>

                <p>
                    <?php echo $monthName; ?>
                </p>

            </div>


            <div class="date-box">

                <h3>Year</h3>

                <p>
                    <?php echo $year; ?>
                </p>

            </div>


            <div class="date-box">

                <h3>Full Date Format</h3>

                <p>
                    <?php echo $fullDate; ?>
                </p>

            </div>


        <?php

        }

        ?>


        <a href="index.php" class="back-button">
            &lt;- Generate Another Report
        </a>

    </div>

</div>

</body>

</html>