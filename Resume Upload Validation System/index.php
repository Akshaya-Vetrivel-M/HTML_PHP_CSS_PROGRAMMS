<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Resume Upload Validation</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

    <div class="main-card">

        <h1>Resume Upload System</h1>

        <p>Upload your resume for validation.</p>

        <form action="process.php" method="post" enctype="multipart/form-data">

            <label for="applicant_name">
                Applicant Name
            </label>

            <input
                type="text"
                id="applicant_name"
                name="applicant_name"
                required
            >

            <label for="resume">
                Select Resume
            </label>

            <input
                type="file"
                id="resume"
                name="resume"
                accept=".pdf,.doc,.docx"
                required
            >

            <p class="file-note">
                Allowed formats: PDF, DOC, DOCX
            </p>

            <button type="submit">
                Upload Resume
            </button>

        </form>

    </div>

</div>

</body>

</html>