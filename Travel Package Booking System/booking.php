<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

<div class="confirmation-box">

<h2>Booking Confirmation</h2>

<?php

if(isset($_POST['name']))
{
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $package=$_POST['package'];
    $travelers=$_POST['travelers'];
    $date=$_POST['date'];

    echo "<p class='success'>Booking Successful</p>";

    echo "<table>";

    echo "<tr>
    <td>Customer Name</td>
    <td>$name</td>
    </tr>";

    echo "<tr>
    <td>Email Address</td>
    <td>$email</td>
    </tr>";

    echo "<tr>
    <td>Phone Number</td>
    <td>$phone</td>
    </tr>";

    echo "<tr>
    <td>Travel Package</td>
    <td>$package</td>
    </tr>";

    echo "<tr>
    <td>Number of Travelers</td>
    <td>$travelers</td>
    </tr>";

    echo "<tr>
    <td>Travel Date</td>
    <td>$date</td>
    </tr>";

    echo "</table>";

}
else
{
    echo "<p class='success'>No booking details found.</p>";
}

?>

<a href="index.php" class="back-btn">Back to Home</a>

</div>

</div>

</body>
</html>