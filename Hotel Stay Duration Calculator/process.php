<?php

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: index.php");
    exit();
}

$guestName = "";
$checkIn = "";
$checkOut = "";

$errorMessage = "";

$displayDate1 = "";
$displayDate2 = "";

$totalDays = 0;


/* Get form data */

if (isset($_POST["guest_name"])) {
    $guestName = trim($_POST["guest_name"]);
}

if (isset($_POST["check_in"])) {
    $checkIn = trim($_POST["check_in"]);
}

if (isset($_POST["check_out"])) {
    $checkOut = trim($_POST["check_out"]);
}


/* Validate guest name */

if ($guestName == "") {

    $errorMessage = "Please enter guest name.";

}


/* Validate check-in */

elseif ($checkIn == "") {

    $errorMessage = "Please select check-in date.";

}


/* Validate check-out */

elseif ($checkOut == "") {

    $errorMessage = "Please select check-out date.";

}


/* Calculate duration */

else {

    $startTime = strtotime($checkIn);

    $endTime = strtotime($checkOut);

    if ($startTime === false || $endTime === false) {

        $errorMessage = "Invalid date entered.";

    }

    elseif ($endTime <= $startTime) {

        $errorMessage =
            "Check-out date must be after check-in date.";

    }

    else {

        $totalSeconds = $endTime - $startTime;

        $totalDays = (int)($totalSeconds / 86400);

        $displayDate1 = date("d-m-Y", $startTime);

        $displayDate2 = date("d-m-Y", $endTime);

    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Hotel Stay Report</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

    <div class="result-card">

        <h1>Hotel Stay Report</h1>

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

        }

        else {

        ?>

            <div class="success-message">

                <h2>Calculation Successful</h2>

                <p>
                    Stay duration calculated successfully.
                </p>

            </div>


            <div class="summary-box">

                <h3>Guest Name</h3>

                <p>
                    <?php
                    echo htmlspecialchars($guestName);
                    ?>
                </p>

            </div>


            <div class="summary-box">

                <h3>Check-in Date</h3>

                <p>
                    <?php
                    echo $displayDate1;
                    ?>
                </p>

            </div>


            <div class="summary-box">

                <h3>Check-out Date</h3>

                <p>
                    <?php
                    echo $displayDate2;
                    ?>
                </p>

            </div>


            <div class="duration-box">

                <h2>Total Stay Duration</h2>

                <p>
                    <?php
                    echo $totalDays;
                    ?>
                    Days
                </p>

            </div>

        <?php

        }

        ?>


        <a href="index.php" class="back-button">
            &lt;- Calculate Again
        </a>

    </div>

</div>

</body>

</html>