<?php

if ($_SERVER["REQUEST_METHOD"] != "POST") {

    header("Location: index.php");
    exit();

}

$employeeName = "";
$employeeId = "";
$attendanceDate = "";
$status = "";

$errorMessage = "";
$successMessage = "";

$employeeName = isset($_POST["employee_name"])
    ? trim($_POST["employee_name"])
    : "";

$employeeId = isset($_POST["employee_id"])
    ? trim($_POST["employee_id"])
    : "";

$attendanceDate = isset($_POST["attendance_date"])
    ? trim($_POST["attendance_date"])
    : "";

$status = isset($_POST["status"])
    ? trim($_POST["status"])
    : "";


/* Validate employee name */

if ($employeeName == "") {

    $errorMessage = "Employee name cannot be empty.";

}


/* Validate employee ID */

elseif ($employeeId == "") {

    $errorMessage = "Employee ID cannot be empty.";

}


/* Validate date */

elseif ($attendanceDate == "") {

    $errorMessage = "Please select an attendance date.";

}


/* Validate attendance status */

elseif ($status == "") {

    $errorMessage = "Please select an attendance status.";

}


/* Save attendance record */

if ($errorMessage == "") {

    $fileName = "attendance.txt";

    $record = $employeeId . " | "
            . $employeeName . " | "
            . $attendanceDate . " | "
            . $status . PHP_EOL;

    $result = file_put_contents(
        $fileName,
        $record,
        FILE_APPEND
    );

    if ($result === false) {

        $errorMessage =
            "Unable to save attendance record.";

    } else {

        $successMessage =
            "Employee attendance has been saved successfully.";

    }

}


/* Read attendance records */

$records = array();

if (file_exists("attendance.txt")) {

    $fileData = file("attendance.txt", FILE_IGNORE_NEW_LINES);

    if ($fileData !== false) {

        foreach ($fileData as $line) {

            if (trim($line) != "") {

                $parts = explode(" | ", $line);

                if (count($parts) == 4) {

                    $records[] = $parts;

                }

            }

        }

    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Attendance Report</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

    <div class="result-card">

        <h1>Employee Attendance Report</h1>

        <?php if ($errorMessage != "") { ?>

            <div class="error-message">

                <h2>Attendance Error</h2>

                <p>
                    <?php
                    echo htmlspecialchars($errorMessage);
                    ?>
                </p>

            </div>

        <?php } else { ?>

            <div class="success-message">

                <h2>Attendance Saved</h2>

                <p>
                    <?php
                    echo htmlspecialchars($successMessage);
                    ?>
                </p>

            </div>

        <?php } ?>


        <h2 class="section-title">
            Stored Attendance Records
        </h2>


        <?php if (count($records) > 0) { ?>

            <div class="attendance-list">

                <?php foreach ($records as $record) { ?>

                    <div class="attendance-item">

                        <div>
                            <strong>Employee ID:</strong>

                            <?php
                            echo htmlspecialchars($record[0]);
                            ?>
                        </div>

                        <div>
                            <strong>Employee Name:</strong>

                            <?php
                            echo htmlspecialchars($record[1]);
                            ?>
                        </div>

                        <div>
                            <strong>Date:</strong>

                            <?php
                            echo htmlspecialchars($record[2]);
                            ?>
                        </div>

                        <div>
                            <strong>Status:</strong>

                            <?php
                            echo htmlspecialchars($record[3]);
                            ?>
                        </div>

                    </div>

                <?php } ?>

            </div>

        <?php } else { ?>

            <div class="empty-box">

                <p>
                    No attendance records are available.
                </p>

            </div>

        <?php } ?>


        <a href="index.php" class="back-button">
            &lt;- Add Another Attendance
        </a>

    </div>

</div>

</body>

</html>