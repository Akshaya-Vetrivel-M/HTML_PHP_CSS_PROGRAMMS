<!DOCTYPE html>
<html>
<head>
    <title>Student Records File Update System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <h1>Student Records</h1>

    <form action="process.php" method="post">

        <label>Register Number</label>
        <input type="text" name="register_no" required>

        <label>Student Name</label>
        <input type="text" name="student_name" required>

        <label>Department</label>
        <input type="text" name="department" required>

        <label>Year</label>
        <input type="text" name="year" required>

        <button type="submit">Save / Update Record</button>

    </form>

    <a href="records.php" class="view-button">View Saved Records</a>

</div>

</body>
</html>