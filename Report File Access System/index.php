<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Report File Access System</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

    <div class="main-card">

        <h1>Report File Access System</h1>

        <p>Select a department to view its available reports.</p>

        <form action="process.php" method="post">

            <label for="department">
                Select Department
            </label>

            <select
                id="department"
                name="department"
                required
            >

                <option value="">
                    Select Department
                </option>

                <option value="Academic">
                    Academic
                </option>

                <option value="Finance">
                    Finance
                </option>

                <option value="HR">
                    Human Resources
                </option>

                <option value="Sales">
                    Sales
                </option>

            </select>

            <button type="submit">
                View Reports
            </button>

        </form>

    </div>

</div>

</body>

</html>