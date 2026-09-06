<?php
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $user_name = $_POST["user_name"];
    $file_name = $_POST["file_name"];
    $activity = $_POST["activity"];

    $access_time = date("Y-m-d H:i:s");

    if (!is_dir("logs")) {
        mkdir("logs");
    }

    $record = "User Name: " . $user_name . "\n";
    $record .= "File Name: " . $file_name . "\n";
    $record .= "Activity: " . $activity . "\n";
    $record .= "Access Time: " . $access_time . "\n";
    $record .= "--------------------------\n";

    file_put_contents("logs/user_activity.txt", $record, FILE_APPEND);

    $message = "Activity saved successfully!";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Activity and File Access Log System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <h1>User Activity and File Access Log System</h1>

    <?php if ($message != "") { ?>
        <p class="message"><?php echo $message; ?></p>
    <?php } ?>

    <form method="post">

        <label>User Name:</label>
        <input type="text" name="user_name" required>

        <label>File Name:</label>
        <input type="text" name="file_name" required>

        <label>Activity:</label>
        <select name="activity" required>
            <option value="">Select Activity</option>
            <option value="Viewed">Viewed</option>
            <option value="Downloaded">Downloaded</option>
            <option value="Updated">Updated</option>
        </select>

        <button type="submit">Save Activity</button>

    </form>

    <h2>Activity Logs</h2>

    <?php
    $file = "logs/user_activity.txt";

    if (file_exists($file)) {
        $logs = file($file, FILE_IGNORE_NEW_LINES);

        foreach ($logs as $log) {
            echo "<p class='record'>" . htmlspecialchars($log) . "</p>";
        }
    } else {
        echo "<p class='message'>No activity logs found.</p>";
    }
    ?>

</div>

</body>
</html>