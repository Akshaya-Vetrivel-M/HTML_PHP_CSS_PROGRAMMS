<?php

if ($_SERVER["REQUEST_METHOD"] != "POST") {

    header("Location: index.php");
    exit();

}

$fileName = "article.txt";

$errorMessage = "";

$articleContent = "";

$lineCount = 0;


/* Check whether the file exists */

if (!file_exists($fileName)) {

    $errorMessage = "Article file was not found.";

} else {

    /* Read the file */

    $articleContent = file_get_contents($fileName);

    if ($articleContent === false) {

        $errorMessage = "Unable to read the article file.";

    } else {

        /* Count the number of lines */

        $lines = file($fileName);

        if ($lines === false) {

            $errorMessage = "Unable to count the lines in the file.";

        } else {

            $lineCount = count($lines);

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

    <title>Article Report</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

<div class="result-card">

<h1>Article Reading Report</h1>


<?php if ($errorMessage != "") { ?>

    <div class="error-message">

        <h2>Error</h2>

        <p>
            <?php
            echo htmlspecialchars($errorMessage);
            ?>
        </p>

    </div>

<?php } else { ?>

    <div class="success-message">

        <h2>Article Read Successfully</h2>

        <p>
            The article has been successfully read
            from the text file.
        </p>

    </div>


    <div class="summary-box">

        <h2>Total Number of Lines</h2>

        <p>
            <?php echo $lineCount; ?>
        </p>

    </div>


    <h2 class="section-title">
        Article Content
    </h2>


    <div class="article-box">

        <?php

        $lines = file($fileName);

        foreach ($lines as $line) {

            echo "<p>";

            echo htmlspecialchars(
                trim($line)
            );

            echo "</p>";

        }

        ?>

    </div>

<?php } ?>


<a href="index.php" class="back-button">
    &lt;- Read Article Again
</a>


</div>

</div>

</body>

</html>