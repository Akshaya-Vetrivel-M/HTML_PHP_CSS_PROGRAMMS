<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: index.php");
    exit();
}

$name = isset($_POST["name"]) ? trim($_POST["name"]) : "";
$email = isset($_POST["email"]) ? trim($_POST["email"]) : "";
$event = isset($_POST["event"]) ? trim($_POST["event"]) : "";
$eventDate = isset($_POST["event_date"]) ? trim($_POST["event_date"]) : "";

$errorMessage = "";
$successMessage = "";
$displayDate = "";
$displayDay = "";

/* Validate name */
if ($name == "") {
    $errorMessage = "Participant name cannot be empty.";
}

/* Validate email */
elseif ($email == "") {
    $errorMessage = "Email address cannot be empty.";
}
elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errorMessage = "Please enter a valid email address.";
}

/* Validate event */
elseif ($event == "") {
    $errorMessage = "Please select an event.";
}

/* Validate date */
elseif ($eventDate == "") {
    $errorMessage = "Please select an event date.";
}
else {

    $timestamp = strtotime($eventDate);

    if ($timestamp === false) {

        $errorMessage = "Invalid event date.";

    }
    else {

        $displayDate = date("d-m-Y", $timestamp);
        $displayDay = date("l", $timestamp);

        /* Store registration in session */

        $_SESSION["name"] = $name;
        $_SESSION["email"] = $email;
        $_SESSION["event"] = $event;
        $_SESSION["event_date"] = $eventDate;

        /* Create event record */

        $record = $name . " | "
                . $email . " | "
                . $event . " | "
                . $displayDate . " | "
                . $displayDay . PHP_EOL;

        /* Save record to file */

        file_put_contents(
            "events.txt",
            $record,
            FILE_APPEND
        );

        $successMessage = "Event registration completed successfully.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Event Registration Result</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

    <div class="result-card">

        <h1>Event Registration Report</h1>

        <?php if ($errorMessage != "") { ?>

            <div class="error-message">

                <h2>Registration Error</h2>

                <p>
                    <?php echo htmlspecialchars($errorMessage); ?>
                </p>

            </div>

        <?php } else { ?>

            <div class="success-message">

                <h2>Registration Successful</h2>

                <p>
                    <?php echo htmlspecialchars($successMessage); ?>
                </p>

            </div>

            <div class="summary-box">

                <h3>Participant Name</h3>

                <p>
                    <?php echo htmlspecialchars($name); ?>
                </p>

            </div>

            <div class="summary-box">

                <h3>Email Address</h3>

                <p>
                    <?php echo htmlspecialchars($email); ?>
                </p>

            </div>

            <div class="summary-box">

                <h3>Event</h3>

                <p>
                    <?php echo htmlspecialchars($event); ?>
                </p>

            </div>

            <div class="summary-box">

                <h3>Event Date</h3>

                <p>
                    <?php echo htmlspecialchars($displayDate); ?>
                </p>

            </div>

            <div class="summary-box">

                <h3>Event Day</h3>

                <p>
                    <?php echo htmlspecialchars($displayDay); ?>
                </p>

            </div>

        <?php } ?>

        <a href="index.php" class="back-button">
            &lt;- Register Another Event
        </a>

    </div>

</div>

</body>

</html>