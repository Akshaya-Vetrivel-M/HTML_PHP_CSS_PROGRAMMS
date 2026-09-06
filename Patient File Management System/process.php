<?php

$patientId = "";
$patientName = "";
$department = "";
$age = "";

$message = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST["patient_id"])) {
        $patientId = trim($_POST["patient_id"]);
    }

    if (isset($_POST["patient_name"])) {
        $patientName = trim($_POST["patient_name"]);
    }

    if (isset($_POST["department"])) {
        $department = trim($_POST["department"]);
    }

    if (isset($_POST["age"])) {
        $age = trim($_POST["age"]);
    }


    if ($patientId == "") {

        $error = "Patient ID is required.";

    } elseif ($patientName == "") {

        $error = "Patient name is required.";

    } elseif ($department == "") {

        $error = "Please select a department.";

    } elseif ($age == "") {

        $error = "Patient age is required.";

    } elseif (!is_numeric($age)) {

        $error = "Age must be a number.";

    } elseif ((int)$age < 1 || (int)$age > 120) {

        $error = "Please enter a valid age.";

    } else {

        $folder = "patients";

        if (!is_dir($folder)) {
            mkdir($folder);
        }


        if ($department == "Cardiology") {

            $file = $folder . "/cardiology.txt";

        } elseif ($department == "Neurology") {

            $file = $folder . "/neurology.txt";

        } elseif ($department == "Orthopedics") {

            $file = $folder . "/orthopedics.txt";

        } else {

            $file = $folder . "/general.txt";

        }


        $record = "Patient ID: " . $patientId . PHP_EOL;
        $record .= "Patient Name: " . $patientName . PHP_EOL;
        $record .= "Department: " . $department . PHP_EOL;
        $record .= "Age: " . $age . PHP_EOL;
        $record .= "------------------------" . PHP_EOL;


        $result = file_put_contents(
            $file,
            $record,
            FILE_APPEND
        );


        if ($result === false) {

            $error = "Unable to save the patient record.";

        } else {

            $message = "Patient record saved successfully.";

        }

    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Patient Record Result</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

    <div class="result-card">

        <h1>Patient Record Result</h1>

        <?php if ($error != "") { ?>

            <div class="error-message">

                <h2>Error</h2>

                <p>
                    <?php
                    echo htmlspecialchars($error);
                    ?>
                </p>

            </div>

        <?php } else { ?>

            <div class="success-message">

                <h2>Record Saved Successfully</h2>

                <p>
                    <?php
                    echo htmlspecialchars($message);
                    ?>
                </p>

            </div>


            <div class="summary-box">

                <h3>Patient ID</h3>

                <p>
                    <?php
                    echo htmlspecialchars($patientId);
                    ?>
                </p>

            </div>


            <div class="summary-box">

                <h3>Patient Name</h3>

                <p>
                    <?php
                    echo htmlspecialchars($patientName);
                    ?>
                </p>

            </div>


            <div class="summary-box">

                <h3>Department</h3>

                <p>
                    <?php
                    echo htmlspecialchars($department);
                    ?>
                </p>

            </div>


            <div class="summary-box">

                <h3>Age</h3>

                <p>
                    <?php
                    echo htmlspecialchars($age);
                    ?>
                </p>

            </div>

        <?php } ?>


        <a href="index.php" class="back-button">
            &lt;- Add Another Patient
        </a>

    </div>

</div>

</body>

</html>