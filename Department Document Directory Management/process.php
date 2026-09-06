<?php

if ($_SERVER["REQUEST_METHOD"] != "POST") {

    header("Location: index.php");
    exit();

}

$action = isset($_POST["action"]) ? $_POST["action"] : "";

$directoryName = isset($_POST["directory_name"])
    ? trim($_POST["directory_name"])
    : "";

$newName = isset($_POST["new_name"])
    ? trim($_POST["new_name"])
    : "";

$message = "";
$messageType = "error";

$baseFolder = "departments";


/* Create the main departments folder */

if (!is_dir($baseFolder)) {

    mkdir($baseFolder, 0777, true);

}


/* Validate directory name */

if ($directoryName == "") {

    $message = "Directory name cannot be empty.";

} elseif (!preg_match("/^[A-Za-z0-9_-]+$/", $directoryName)) {

    $message = "Directory name can contain only letters, numbers, hyphen, and underscore.";

} elseif ($action == "create") {

    $folderPath = $baseFolder . "/" . $directoryName;

    if (is_dir($folderPath)) {

        $message = "The directory already exists.";

    } else {

        if (mkdir($folderPath, 0777, true)) {

            $message = "Department directory created successfully.";
            $messageType = "success";

        } else {

            $message = "Unable to create the directory.";

        }

    }

} elseif ($action == "rename") {

    if ($newName == "") {

        $message = "Please enter the new directory name.";

    } elseif (!preg_match("/^[A-Za-z0-9_-]+$/", $newName)) {

        $message = "New directory name can contain only letters, numbers, hyphen, and underscore.";

    } else {

        $oldPath = $baseFolder . "/" . $directoryName;
        $newPath = $baseFolder . "/" . $newName;

        if (!is_dir($oldPath)) {

            $message = "The directory to rename does not exist.";

        } elseif (is_dir($newPath)) {

            $message = "A directory with the new name already exists.";

        } elseif (rename($oldPath, $newPath)) {

            $message = "Directory renamed successfully.";
            $messageType = "success";

        } else {

            $message = "Unable to rename the directory.";

        }

    }

} elseif ($action == "delete") {

    $folderPath = $baseFolder . "/" . $directoryName;

    if (!is_dir($folderPath)) {

        $message = "The directory does not exist.";

    } else {

        /*
         * Directory must be empty before deletion.
         */

        $files = scandir($folderPath);

        if ($files !== false && count($files) > 2) {

            $message = "The directory is not empty. Remove its files before deleting it.";

        } elseif (rmdir($folderPath)) {

            $message = "Directory deleted successfully.";
            $messageType = "success";

        } else {

            $message = "Unable to delete the directory.";

        }

    }

} else {

    $message = "Please select a valid directory operation.";

}


/* Get current directories */

$directories = array();

if (is_dir($baseFolder)) {

    $items = scandir($baseFolder);

    if ($items !== false) {

        foreach ($items as $item) {

            if ($item != "." && $item != "..") {

                if (is_dir($baseFolder . "/" . $item)) {

                    $directories[] = $item;

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

    <title>Directory Report</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

    <div class="result-card">

        <h1>Department Directory Report</h1>

        <div class="<?php echo $messageType == 'success' ? 'success-message' : 'error-message'; ?>">

            <h2>
                <?php
                echo $messageType == "success"
                    ? "Operation Successful"
                    : "Operation Error";
                ?>
            </h2>

            <p>
                <?php
                echo htmlspecialchars($message);
                ?>
            </p>

        </div>

        <h2 class="section-title">
            Available Department Directories
        </h2>

        <?php if (count($directories) > 0) { ?>

            <div class="directory-list">

                <?php foreach ($directories as $directory) { ?>

                    <div class="directory-item">

                        <span class="folder-icon">
                            [Folder]
                        </span>

                        <span>
                            <?php
                            echo htmlspecialchars($directory);
                            ?>
                        </span>

                    </div>

                <?php } ?>

            </div>

        <?php } else { ?>

            <div class="empty-box">

                <p>
                    No department directories are currently available.
                </p>

            </div>

        <?php } ?>

        <a href="index.php" class="back-button">
            &lt;- Manage Directories
        </a>

    </div>

</div>

</body>

</html>