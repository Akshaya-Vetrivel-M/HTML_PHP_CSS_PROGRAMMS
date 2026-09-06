<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Multimedia File Management</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

    <div class="main-card">

        <h1>Multimedia File Management</h1>

        <p>
            Search for an image or video from the multimedia collection.
        </p>

        <form action="process.php" method="post">

            <label for="search">Enter File Name</label>

            <input
                type="text"
                id="search"
                name="search"
                placeholder="Example: nature"
                required
            >

            <button type="submit">
                Search File
            </button>

        </form>

    </div>

</div>

</body>

</html>