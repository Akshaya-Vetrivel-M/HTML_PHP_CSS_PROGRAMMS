<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Stay Duration Calculator</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

    <div class="card">

        <h1>Hotel Stay Duration Calculator</h1>

        <p class="description">
            Enter the guest check-in and check-out dates to calculate
            the total duration of stay.
        </p>

        <form action="process.php" method="post">

            <div class="form-group">

                <label for="guest_name">
                    Guest Name
                </label>

                <input
                    type="text"
                    id="guest_name"
                    name="guest_name"
                    placeholder="Enter guest name"
                    required
                >

            </div>

            <div class="form-group">

                <label for="check_in">
                    Check-in Date
                </label>

                <input
                    type="date"
                    id="check_in"
                    name="check_in"
                    required
                >

            </div>

            <div class="form-group">

                <label for="check_out">
                    Check-out Date
                </label>

                <input
                    type="date"
                    id="check_out"
                    name="check_out"
                    required
                >

            </div>

            <button type="submit">
                Calculate Stay
            </button>

        </form>

    </div>

</div>

</body>

</html>