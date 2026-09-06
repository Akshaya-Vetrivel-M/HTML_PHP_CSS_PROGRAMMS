<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Online Shopping User Management</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

    <div class="main-card">

        <h1>Online Shopping</h1>

        <p>Enter your details to manage your shopping session.</p>

        <form action="process.php" method="post">

            <label for="username">Customer Name</label>

            <input
                type="text"
                id="username"
                name="username"
                required
            >

            <label for="product">Select Product</label>

            <select id="product" name="product" required>

                <option value="">Select a product</option>

                <option value="Laptop">Laptop</option>

                <option value="Headphones">Headphones</option>

                <option value="Smart Watch">Smart Watch</option>

                <option value="Mobile Phone">Mobile Phone</option>

                <option value="Camera">Camera</option>

            </select>

            <button type="submit">
                Add to Shopping Cart
            </button>

        </form>

    </div>

</div>

</body>

</html>