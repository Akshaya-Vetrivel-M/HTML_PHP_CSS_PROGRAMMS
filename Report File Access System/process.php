<?php

$department = "";
$message = "";
$error = "";
$files = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST["department"])) {

        $department = trim($_POST["department"]);

    }

    if ($department == "") {

        $error = "Please select a department.";

    } else {

        /*
         * Set the folder according to the department.
         */

        if ($department == "Academic") {

            $folder = "reports/academic";

        } elseif ($department == "Finance") {

            $folder = "reports/finance";

        } elseif ($department == "HR") {

            $folder = "reports/hr";

        } else {

            $folder = "reports/sales";

        }


        /*
         * Create the folders if they do not exist.
         */

        if (!is_dir("reports")) {

            mkdir("reports");

        }

        if (!is_dir($folder)) {

            mkdir($folder);

        }


        /*
         * Create sample report files.
         * These are created only when the folder is empty.
         */

        $existingFiles = scandir($folder);

        if (count($existingFiles) <= 2) {

            file_put_contents(
                $folder . "/report1.txt",
                "This is the first report for " . $department . "."
            );

            file_put_contents(
                $folder . "/report2.txt",
                "This is the second report for " . $department . "."
            );

        }


        /*
         * Read the files from the selected directory.
         */

        $files = scandir($folder);

        /*
         * Remove . and ..
         */

        $files = array_diff(
            $files,
            array(".", "..")
        );


        if (count($files) > 0) {

            $message = "Reports available for " . $department . ".";

        } else {

            $error = "No reports are available.";

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

    <title>Report Access Result</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

    <div class="result-card">

        <h1>Report Access Result</h1>

        <?php if ($error != "") { ?>

            <div class="error-message">

                <h2>Access Error</h2>

                <p>
                    <?php
                    echo htmlspecialchars($error);
                    ?>
                </p>

            </div>

        <?php } else { ?>

            <div class="success-message">

                <h2>Reports Available</h2>

                <p>
                    <?php
                    echo htmlspecialchars($message);
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


            <div class="report-list">

                <h2>Available Reports</h2>

                <?php

                foreach ($files as $file) {

                ?>

                    <div class="report-item">

                        <span>
                            <?php
                            echo htmlspecialchars($file);
                            ?>
                        </span>

                        <a
                            href="<?php
                            echo htmlspecialchars(
                                $folder . "/" . $file
                            );
                            ?>"
                            target="_blank"
                        >
                            Open Report
                        </a>

                    </div>

                <?php

                }

                ?>

            </div>

        <?php } ?>


        <a href="index.php" class="back-button">
            &lt;- Select Another Department
        </a>

    </div>

</div>

</body>

</html>