<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Department Directory Management</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

    <div class="card">

        <h1>Department Directory Management</h1>

        <p class="description">
            Create, rename, or delete department directories.
        </p>

        <form action="process.php" method="post">

            <div class="form-group">

                <label for="action">
                    Select Operation
                </label>

                <select id="action" name="action" required>

                    <option value="">
                        -- Select Operation --
                    </option>

                    <option value="create">
                        Create Directory
                    </option>

                    <option value="rename">
                        Rename Directory
                    </option>

                    <option value="delete">
                        Delete Directory
                    </option>

                </select>

            </div>

            <div class="form-group">

                <label for="directory_name">
                    Directory Name
                </label>

                <input
                    type="text"
                    id="directory_name"
                    name="directory_name"
                    placeholder="Example: ComputerScience"
                    required
                >

            </div>

            <div class="form-group">

                <label for="new_name">
                    New Directory Name
                </label>

                <input
                    type="text"
                    id="new_name"
                    name="new_name"
                    placeholder="Required only for rename"
                >

            </div>

            <button type="submit">
                Perform Operation
            </button>

        </form>

    </div>

</div>

</body>

</html>