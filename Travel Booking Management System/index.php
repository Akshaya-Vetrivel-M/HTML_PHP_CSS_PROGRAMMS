<!DOCTYPE html>
<html>
<head>
    <title>Travel Booking Management System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h1>Travel Booking Management System</h1>

    <form action="process.php" method="post">

        <label>Passenger Name:</label>
        <input type="text" name="passenger_name" required>

        <label>Travel From:</label>
        <input type="text" name="travel_from" required>

        <label>Destination:</label>
        <input type="text" name="destination" required>

        <label>Travel Date:</label>
        <input type="date" name="travel_date" required>

        <button type="submit">Book Travel</button>
    </form>

    <a href="booking.php" class="view-button">View Bookings</a>
</div>

</body>
</html>