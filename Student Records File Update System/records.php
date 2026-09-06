<?php

$records = [];

if (file_exists("students/students.txt")) {
    $records = file("students/students.txt", FILE_IGNORE_NEW_LINES);
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Saved Student Records</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <h1>Saved Student Records</h1>

    <?php
    if (count($records) > 0) {

        foreach ($records as $record) {
            echo "<div class='record'>";
            echo htmlspecialchars($record);
            echo "</div>";
        }

    } else {
        echo "<p>No student records available.</p>";
    }
    ?>

    <a href="index.php" class="back-button">Add / Update Record</a>

</div>

</body>
</html>