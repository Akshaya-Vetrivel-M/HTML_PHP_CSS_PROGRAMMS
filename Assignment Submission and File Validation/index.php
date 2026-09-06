<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Assignment Submission</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

    <div class="card">

        <h1>Assignment Submission</h1>

        <p class="description">
            Upload your assignment and select your department.
            Only PDF, DOC, DOCX and TXT files are accepted.
        </p>

        <form action="process.php" method="POST" enctype="multipart/form-data">

            <div class="form-group">

                <label for="student_name">
                    Student Name
                </label>

                <input
                    type="text"
                    id="student_name"
                    name="student_name"
                    placeholder="Enter your name"
                    required
                >

            </div>

            <div class="form-group">

                <label for="department">
                    Department
                </label>

                <select
                    id="department"
                    name="department"
                    required
                >

                    <option value="">
                        Select Department
                    </option>

                    <option value="CSE">
                        Computer Science and Engineering
                    </option>

                    <option value="IT">
                        Information Technology
                    </option>

                    <option value="ECE">
                        Electronics and Communication Engineering
                    </option>

                </select>

            </div>

            <div class="form-group">

                <label for="assignment">
                    Select Assignment File
                </label>

                <input
                    type="file"
                    id="assignment"
                    name="assignment"
                    accept=".pdf,.doc,.docx,.txt"
                    required
                >

            </div>

            <button type="submit">
                Upload Assignment
            </button>

        </form>

    </div>

</div>

</body>

</html>