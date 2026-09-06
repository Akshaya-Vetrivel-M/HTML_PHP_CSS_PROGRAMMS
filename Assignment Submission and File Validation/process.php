<?php

if ($_SERVER["REQUEST_METHOD"] != "POST") {

    header("Location: index.php");
    exit();

}

$studentName = isset($_POST["student_name"])
    ? trim($_POST["student_name"])
    : "";

$department = isset($_POST["department"])
    ? $_POST["department"]
    : "";

$errorMessage = "";
$successMessage = "";
$fileName = "";


/* Validate student name */

if ($studentName == "") {

    $errorMessage = "Student name cannot be empty.";

}


/* Validate department */

elseif (
    $department != "CSE" &&
    $department != "IT" &&
    $department != "ECE"
) {

    $errorMessage = "Please select a valid department.";

}


/* Check uploaded file */

elseif (!isset($_FILES["assignment"])) {

    $errorMessage = "Please select an assignment file.";

}


/* Check upload error */

elseif ($_FILES["assignment"]["error"] != 0) {

    $errorMessage = "There was an error while uploading the file.";

}


else {

    $fileName = $_FILES["assignment"]["name"];

    $temporaryFile = $_FILES["assignment"]["tmp_name"];

    $fileSize = $_FILES["assignment"]["size"];


    /* Get file extension */

    $fileExtension = strtolower(
        pathinfo($fileName, PATHINFO_EXTENSION)
    );


    /* Allowed file types */

    $allowedExtensions = array(
        "pdf",
        "doc",
        "docx",
        "txt"
    );


    /* Validate file type */

    if (!in_array($fileExtension, $allowedExtensions)) {

        $errorMessage =
            "Invalid file type. Only PDF, DOC, DOCX and TXT files are allowed.";

    }


    /* Validate file size */

    elseif ($fileSize > 5 * 1024 * 1024) {

        $errorMessage =
            "File size must not exceed 5 MB.";

    }


    else {

        /* Create upload directory */

        $uploadDirectory = "uploads/" . $department . "/";


        if (!is_dir($uploadDirectory)) {

            mkdir(
                $uploadDirectory,
                0777,
                true
            );

        }


        /* Create a safe file name */

        $safeName = preg_replace(
            "/[^A-Za-z0-9._-]/",
            "_",
            basename($fileName)
        );


        $destination =
            $uploadDirectory . $safeName;


        /* Move uploaded file */

        if (move_uploaded_file(
            $temporaryFile,
            $destination
        )) {

            $successMessage =
                "Assignment uploaded successfully.";

        } else {

            $errorMessage =
                "Unable to save the uploaded file.";

        }

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

    <title>Assignment Upload Report</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

<div class="result-card">

<h1>Assignment Upload Report</h1>


<?php if ($errorMessage != "") { ?>

    <div class="error-message">

        <h2>Upload Failed</h2>

        <p>
            <?php
            echo htmlspecialchars($errorMessage);
            ?>
        </p>

    </div>

<?php } else { ?>

    <div class="success-message">

        <h2>Upload Successful</h2>

        <p>
            <?php
            echo htmlspecialchars($successMessage);
            ?>
        </p>

    </div>


    <div class="summary-box">

        <h3>Student Name</h3>

        <p>
            <?php
            echo htmlspecialchars($studentName);
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

        <h3>Uploaded File</h3>

        <p>
            <?php
            echo htmlspecialchars($fileName);
            ?>
        </p>

    </div>


    <div class="summary-box">

        <h3>File Type</h3>

        <p>
            <?php
            echo strtoupper($fileExtension);
            ?>
        </p>

    </div>

<?php } ?>


<a href="index.php" class="back-button">
    &lt;- Submit Another Assignment
</a>


</div>

</div>

</body>

</html>