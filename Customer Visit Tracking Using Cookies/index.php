<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Customer Visit Tracking</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

    <div class="card">

        <h1>Customer Visit Tracking</h1>

        <p class="description">
            Enter your name and select your preferred theme.
            Your preferences and visit count will be stored
            using cookies.
        </p>

        <form action="process.php" method="POST">

            <div class="form-group">

                <label for="customer_name">
                    Customer Name
                </label>

                <input
                    type="text"
                    id="customer_name"
                    name="customer_name"
                    placeholder="Enter your name"
                    required
                >

            </div>

            <div class="form-group">

                <label for="preference">
                    Preferred Category
                </label>

                <select
                    id="preference"
                    name="preference"
                    required
                >

                    <option value="">
                        Select a category
                    </option>

                    <option value="Technology">
                        Technology
                    </option>

                    <option value="Books">
                        Books
                    </option>

                    <option value="Fashion">
                        Fashion
                    </option>

                    <option value="Electronics">
                        Electronics
                    </option>

                </select>

            </div>

            <button type="submit">
                Save Preferences
            </button>

        </form>

    </div>

</div>

</body>

</html>