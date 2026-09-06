<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $passenger_name = $_POST["passenger_name"];
    $travel_from = $_POST["travel_from"];
    $destination = $_POST["destination"];
    $travel_date = $_POST["travel_date"];

    $booking_date = date("Y-m-d H:i:s");

    if (!is_dir("bookings")) {
        mkdir("bookings");
    }

    $record = "Passenger Name: " . $passenger_name . "\n";
    $record .= "Travel From: " . $travel_from . "\n";
    $record .= "Destination: " . $destination . "\n";
    $record .= "Travel Date: " . $travel_date . "\n";
    $record .= "Booking Date: " . $booking_date . "\n";
    $record .= "--------------------------\n";

    file_put_contents("bookings/travel_bookings.txt", $record, FILE_APPEND);

    header("Location: booking.php");
    exit();
}

?>