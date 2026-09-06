<?php

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: index.php");
    exit();
}

$projectName = "";
$developerName = "";
$workDescription = "";

$errorMessage = "";
$successMessage = "";

$date = "";
$time = "";
$fileName = "";

$projectName = isset($_POST["project_name"])
    ? trim($_POST["project_name"])
    : "";

$developerName = isset($_POST["developer_name"])
    ? trim($_POST["developer_name"])
    : "";

$workDescription = isset($_POST["work_description"])
    ? trim($_POST["work_description"])
    : "";


/* Validate project name */

if ($projectName == "") {

    $errorMessage = "Project name cannot be empty.";

}


/* Validate developer name */

elseif ($developerName == "") {

    $errorMessage = "Developer name cannot be empty.";

}


/* Validate work description */

elseif ($workDescription == "") {

    $errorMessage = "Work description cannot be empty.";

}


/* Create daily log */

else {

    $date = date("Y-m-d");

    $time = date("H:i:s");

    $fileName = "project_log_" . $date . ".txt";


    $logData = "DAILY PROJECT LOG\n";
    $logData .= "=================\n\n";

    $logData .= "Project Name: " . $projectName . "\n";

    $logData .= "Developer Name: " . $developerName . "\n";

    $logData .= "Date: " . $date . "\n";

    $logData .= "Time: " . $time . "\n\n";

    $logData .= "Work Description:\n";

    $logData .= $workDescription . "\n";


    $fileCreated = file_put_contents(
        $fileName,
        $logData
    );


    if ($fileCreated === false) {

        $errorMessage = "Unable to create the project log file.";

    } else {

        $successMessage = "Daily project log created successfully.";

    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Project Log Result</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

    <div class="result-card">

        <h1>Daily Project Log Report</h1>


        <?php if ($errorMessage != "") { ?>

            <div class="error-message">

                <h2>Log Creation Error</h2>

                <p>
                    <?php
                    echo htmlspecialchars($errorMessage);
                    ?>
                </p>

            </div>

        <?php } else { ?>


            <div class="success-message">

                <h2>Log Created Successfully</h2>

                <p>
                    <?php
                    echo htmlspecialchars($successMessage);
                    ?>
                </p>

            </div>


            <div class="summary-box">

                <h3>Project Name</h3>

                <p>
                    <?php
                    echo htmlspecialchars($projectName);
                    ?>
                </p>

            </div>


            <div class="summary-box">

                <h3>Developer Name</h3>

                <p>
                    <?php
                    echo htmlspecialchars($developerName);
                    ?>
                </p>

            </div>


            <div class="summary-box">

                <h3>Date</h3>

                <p>
                    <?php
                    echo htmlspecialchars($date);
                    ?>
                </p>

            </div>


            <div class="summary-box">

                <h3>Time</h3>

                <p>
                    <?php
                    echo htmlspecialchars($time);
                    ?>
                </p>

            </div>


            <div class="file-box">

                <h2>Generated File</h2>

                <p>
                    <?php
                    echo htmlspecialchars($fileName);
                    ?>
                </p>

            </div>


            <div class="description-box">

                <h2>Work Description</h2>

                <p>
                    <?php
                    echo nl2br(
                        htmlspecialchars($workDescription)
                    );
                    ?>
                </p>

            </div>


        <?php } ?>


        <a href="index.php" class="back-button">
            &lt;- Create Another Log
        </a>

    </div>

</div>

</body>

</html>