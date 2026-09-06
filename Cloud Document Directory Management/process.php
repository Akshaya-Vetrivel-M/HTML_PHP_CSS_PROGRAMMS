<?php

if ($_SERVER["REQUEST_METHOD"] != "POST") {

    header("Location: index.php");
    exit();

}

$directory = "documents/";

$message = "";
$messageType = "";

$action = isset($_POST["action"])
    ? $_POST["action"]
    : "";


/* Create documents directory if it does not exist */

if (!is_dir($directory)) {

    mkdir($directory, 0777, true);

}


/* =========================
   UPLOAD DOCUMENT
   ========================= */

if ($action == "upload") {

    if (!isset($_FILES["document"])) {

        $message = "Please select a document.";
        $messageType = "error";

    } elseif ($_FILES["document"]["error"] != 0) {

        $message = "There was an error while uploading the document.";
        $messageType = "error";

    } else {

        $originalName = $_FILES["document"]["name"];

        $temporaryName = $_FILES["document"]["tmp_name"];

        $fileSize = $_FILES["document"]["size"];

        $extension = strtolower(
            pathinfo($originalName, PATHINFO_EXTENSION)
        );


        /* Allowed file types */

        $allowedTypes = array(
            "pdf",
            "doc",
            "docx",
            "txt"
        );


        /* Validate file type */

        if (!in_array($extension, $allowedTypes)) {

            $message =
                "Invalid file type. Only PDF, DOC, DOCX and TXT files are allowed.";

            $messageType = "error";

        }


        /* Validate file size */

        elseif ($fileSize > 5 * 1024 * 1024) {

            $message =
                "File size must not exceed 5 MB.";

            $messageType = "error";

        } else {

            /* Create a safe file name */

            $safeName = preg_replace(
                "/[^A-Za-z0-9._-]/",
                "_",
                basename($originalName)
            );


            $destination = $directory . $safeName;


            /* Prevent duplicate files */

            if (file_exists($destination)) {

                $message =
                    "A document with this name already exists.";

                $messageType = "error";

            } else {

                if (
                    move_uploaded_file(
                        $temporaryName,
                        $destination
                    )
                ) {

                    $message =
                        "Document uploaded successfully.";

                    $messageType = "success";

                } else {

                    $message =
                        "Unable to save the document.";

                    $messageType = "error";

                }

            }

        }

    }

}


/* =========================
   DELETE DOCUMENT
   ========================= */

elseif ($action == "delete") {

    $deleteFile = isset($_POST["delete_file"])
        ? $_POST["delete_file"]
        : "";


    if ($deleteFile == "") {

        $message =
            "Please select a document to delete.";

        $messageType = "error";

    } else {

        /*
         * Remove unsafe path information.
         */

        $deleteFile = basename($deleteFile);

        $filePath = $directory . $deleteFile;


        if (!file_exists($filePath)) {

            $message =
                "The selected document does not exist.";

            $messageType = "error";

        } elseif (!is_file($filePath)) {

            $message =
                "The selected item is not a valid file.";

            $messageType = "error";

        } elseif (unlink($filePath)) {

            $message =
                "Document deleted successfully.";

            $messageType = "success";

        } else {

            $message =
                "Unable to delete the document.";

            $messageType = "error";

        }

    }

}


/* =========================
   INVALID ACTION
   ========================= */

else {

    $message =
        "Invalid operation requested.";

    $messageType = "error";

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

    <title>Document Management Report</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

<div class="result-card">

<h1>Document Management Report</h1>


<?php if ($messageType == "success") { ?>

    <div class="success-message">

        <h2>Operation Successful</h2>

        <p>
            <?php
            echo htmlspecialchars($message);
            ?>
        </p>

    </div>

<?php } else { ?>

    <div class="error-message">

        <h2>Operation Failed</h2>

        <p>
            <?php
            echo htmlspecialchars($message);
            ?>
        </p>

    </div>

<?php } ?>


<div class="directory-box">

    <h2>Document Directory</h2>

    <p>
        All documents are stored inside:
    </p>

    <strong>
        documents/
    </strong>

</div>


<h2 class="section-title">
Available Documents
</h2>


<div class="document-list">

<?php

$files = scandir($directory);

$foundFile = false;

foreach ($files as $file) {

    if (
        $file != "." &&
        $file != ".." &&
        is_file($directory . $file)
    ) {

        $foundFile = true;

        echo '<div class="document-item">';

        echo '<span>';

        echo htmlspecialchars($file);

        echo '</span>';

        echo '<span class="file-status">Available</span>';

        echo '</div>';

    }

}


if (!$foundFile) {

    echo '<p class="empty-message">';
    echo 'No documents are currently stored.';
    echo '</p>';

}

?>

</div>


<a href="index.php" class="back-button">
    &lt;- Back to Document Management
</a>


</div>

</div>

</body>

</html>