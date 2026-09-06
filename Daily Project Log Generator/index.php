<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Daily Project Log Generator</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

    <div class="card">

        <h1>Daily Project Log Generator</h1>

        <p class="description">
            Enter project details to create a daily project log file.
        </p>

        <form action="process.php" method="post">

            <div class="form-group">

                <label for="project_name">
                    Project Name
                </label>

                <input
                    type="text"
                    id="project_name"
                    name="project_name"
                    placeholder="Enter project name"
                    required
                >

            </div>


            <div class="form-group">

                <label for="developer_name">
                    Developer Name
                </label>

                <input
                    type="text"
                    id="developer_name"
                    name="developer_name"
                    placeholder="Enter developer name"
                    required
                >

            </div>


            <div class="form-group">

                <label for="work_description">
                    Work Description
                </label>

                <textarea
                    id="work_description"
                    name="work_description"
                    rows="5"
                    placeholder="Enter today's work description"
                    required
                ></textarea>

            </div>


            <button type="submit">
                Create Project Log
            </button>

        </form>

    </div>

</div>

</body>
</html>