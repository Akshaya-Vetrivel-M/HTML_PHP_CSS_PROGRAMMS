<?php

$applicantName = "";
$fileName = "";
$fileSize = 0;
$fileType = "";
$message = "";
$error = "";

$uploadFolder = "resumes";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    /* Get applicant name */

    if (isset($_POST["applicant_name"])) {

        $applicantName = trim($_POST["applicant_name"]);

    }


    /* Validate applicant name */

    if ($applicantName == "") {

        $error = "Applicant name cannot be empty.";

    }

    /* Check uploaded file */

    elseif (!isset($_FILES["resume"])) {

        $error = "Please select a resume.";

    }

    elseif ($_FILES["resume"]["error"] != 0) {

        $error = "There was an error while uploading the resume.";

    }

    else {

        $fileName = $_FILES["resume"]["name"];
        $fileSize = $_FILES["resume"]["size"];
        $temporaryFile = $_FILES["resume"]["tmp_name"];

        $fileExtension = strtolower(
            pathinfo($fileName, PATHINFO_EXTENSION)
        );


        /* Allowed file types */

        $allowedTypes = array(
            "pdf",
            "doc",
            "docx"
        );


        /* Maximum file size: 2 MB */

        $maximumSize = 2 * 1024 * 1024;


        /* Validate file type */

        if (!in_array($fileExtension, $allowedTypes)) {

            $error = "Invalid file type. Please upload PDF, DOC or DOCX.";

        }

        /* Validate file size */

        elseif ($fileSize > $maximumSize) {

            $error = "File size must not exceed 2 MB.";

        }

        else {

            /*
             * Create upload folder if it does not exist.
             */

            if (!is_dir($uploadFolder)) {

                mkdir($uploadFolder);

            }


            /*
             * Create a safe file name.
             */

            $safeName = preg_replace(
                "/[^A-Za-z0-9._-]/",
                "_",
                $fileName
            );


            $destination = $uploadFolder . "/" . $safeName;


            /*
             * Move uploaded file.
             */

            if (move_uploaded_file(
                $temporaryFile,
                $destination
            )) {

                $message = "Resume uploaded successfully.";

            } else {

                $error = "Unable to save the uploaded resume.";

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

    <title>Resume Upload Result</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

    <div class="result-card">

        <h1>Resume Upload Result</h1>


        <?php if ($error != "") { ?>

            <div class="error-message">

                <h2>Upload Failed</h2>

                <p>
                    <?php
                    echo htmlspecialchars($error);
                    ?>
                </p>

            </div>

        <?php } else { ?>

            <div class="success-message">

                <h2>Upload Successful</h2>

                <p>
                    <?php
                    echo htmlspecialchars($message);
                    ?>
                </p>

            </div>


            <div class="summary-box">

                <h3>Applicant Name</h3>

                <p>
                    <?php
                    echo htmlspecialchars($applicantName);
                    ?>
                </p>

            </div>


            <div class="summary-box">

                <h3>Resume File</h3>

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
                    echo htmlspecialchars(
                        strtoupper($fileExtension)
                    );
                    ?>
                </p>

            </div>


            <div class="summary-box">

                <h3>File Size</h3>

                <p>
                    <?php
                    echo round($fileSize / 1024, 2);
                    ?>
                    KB
                </p>

            </div>

        <?php } ?>


        <a href="index.php" class="back-button">
            &lt;- Upload Another Resume
        </a>

    </div>

</div>

</body>

</html>