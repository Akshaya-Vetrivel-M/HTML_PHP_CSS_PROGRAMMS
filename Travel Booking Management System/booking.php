<?php

$file = "bookings/travel_bookings.txt";

$bookings = [];

if (file_exists($file)) {
    $bookings = file($file, FILE_IGNORE_NEW_LINES);
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Saved Travel Bookings</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h1>Saved Travel Bookings</h1>

    <?php if (empty($bookings)) { ?>

        <p class="message">No bookings found.</p>

    <?php } else { ?>

        <?php foreach ($bookings as $booking) { ?>

            <p class="record">
                <?php echo htmlspecialchars($booking); ?>
            </p>

        <?php } ?>

    <?php } ?>

    <a href="index.php" class="view-button">New Booking</a>
</div>

</body>
</html>