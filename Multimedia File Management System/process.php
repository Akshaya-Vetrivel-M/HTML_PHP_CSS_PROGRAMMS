<?php

if ($_SERVER["REQUEST_METHOD"] != "POST") {

    header("Location: index.php");

    exit();

}

$search = "";

$errorMessage = "";

$results = array();


/* Get search value */

if (isset($_POST["search"])) {

    $search = trim($_POST["search"]);

}


/* Validate search */

if ($search == "") {

    $errorMessage = "Please enter a file name.";

}
else {

    /*
     * Multimedia files stored in an array.
     */

    $files = array(

        "nature.jpg",
        "mountain.jpg",
        "beach.jpg",
        "flowers.jpg",
        "sunset.jpg",
        "wildlife.mp4",
        "travel.mp4",
        "music.mp4",
        "festival.mp4",
        "nature_video.mp4"

    );


    /*
     * Search files.
     */

    foreach ($files as $file) {

        if (stripos($file, $search) !== false) {

            $results[] = $file;

        }

    }


    if (count($results) == 0) {

        $errorMessage = "No multimedia file found.";

    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Search Result</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

    <div class="result-card">

        <h1>Multimedia Search Result</h1>

        <?php

        if ($errorMessage != "") {

        ?>

            <div class="error-message">

                <h2>Search Error</h2>

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

                <h2>Files Found</h2>

                <p>
                    Matching multimedia files are displayed below.
                </p>

            </div>


            <div class="summary-box">

                <h3>Search Term</h3>

                <p>
                    <?php
                    echo htmlspecialchars($search);
                    ?>
                </p>

            </div>


            <div class="file-list">

                <?php

                foreach ($results as $file) {

                    $extension = strtolower(
                        pathinfo($file, PATHINFO_EXTENSION)
                    );

                    ?>

                    <div class="file-item">

                        <span class="file-name">
                            <?php
                            echo htmlspecialchars($file);
                            ?>
                        </span>

                        <span class="file-type">
                            <?php

                            if (
                                $extension == "jpg" ||
                                $extension == "png" ||
                                $extension == "jpeg"
                            ) {

                                echo "Image";

                            }
                            else {

                                echo "Video";

                            }

                            ?>
                        </span>

                    </div>

                    <?php

                }

                ?>

            </div>


            <div class="summary-box">

                <h3>Total Files Found</h3>

                <p>
                    <?php
                    echo count($results);
                    ?>
                </p>

            </div>

        <?php

        }

        ?>


        <a href="index.php" class="back-button">
            &lt;- Search Again
        </a>

    </div>

</div>

</body>

</html>