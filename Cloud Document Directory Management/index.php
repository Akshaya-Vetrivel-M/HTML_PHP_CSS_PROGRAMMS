<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cloud Document Management</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

    <div class="card">

        <h1>Cloud Document Management</h1>

        <p class="description">
            Upload a document, store it safely, or delete an
            existing document from the document directory.
        </p>

        <form action="process.php" method="POST" enctype="multipart/form-data">

            <div class="form-group">

                <label for="document">
                    Select Document
                </label>

                <input
                    type="file"
                    id="document"
                    name="document"
                    accept=".pdf,.doc,.docx,.txt"
                    required
                >

            </div>

            <button type="submit" name="action" value="upload">
                Upload Document
            </button>

        </form>

        <div class="divider"></div>

        <h2 class="section-title">
            Stored Documents
        </h2>

        <form action="process.php" method="POST">

            <div class="form-group">

                <label for="delete_file">
                    Select File to Delete
                </label>

                <select
                    id="delete_file"
                    name="delete_file"
                >

                    <option value="">
                        Select a document
                    </option>

                    <?php

                    $directory = "documents/";

                    if (is_dir($directory)) {

                        $files = scandir($directory);

                        foreach ($files as $file) {

                            if (
                                $file != "." &&
                                $file != ".." &&
                                is_file($directory . $file)
                            ) {

                                echo '<option value="' .
                                    htmlspecialchars($file) .
                                    '">' .
                                    htmlspecialchars($file) .
                                    '</option>';

                            }

                        }

                    }

                    ?>

                </select>

            </div>

            <button
                type="submit"
                name="action"
                value="delete"
                class="delete-button"
            >
                Delete Document
            </button>

        </form>

    </div>

</div>

</body>

</html>