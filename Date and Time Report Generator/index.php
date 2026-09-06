<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Date and Time Report Generator</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

    <div class="card">

        <h1>Date and Time Report</h1>

        <p class="description">
            Generate a report showing the current date and time
            in different formats.
        </p>

        <form action="process.php" method="post">

            <div class="form-group">

                <label for="name">
                    Enter Your Name
                </label>

                <input
                    type="text"
                    id="name"
                    name="name"
                    placeholder="Enter your name"
                    required
                >

            </div>

            <button type="submit">
                Generate Report
            </button>

        </form>

    </div>

</div>

</body>

</html>