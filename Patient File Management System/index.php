<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Patient File Management</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

    <div class="main-card">

        <h1>Patient File Management</h1>

        <p>Enter patient details to store the record.</p>

        <form action="process.php" method="post">

            <label for="patient_id">Patient ID</label>

            <input
                type="text"
                id="patient_id"
                name="patient_id"
                required
            >

            <label for="patient_name">Patient Name</label>

            <input
                type="text"
                id="patient_name"
                name="patient_name"
                required
            >

            <label for="department">Department</label>

            <select
                id="department"
                name="department"
                required
            >

                <option value="">Select Department</option>

                <option value="Cardiology">
                    Cardiology
                </option>

                <option value="Neurology">
                    Neurology
                </option>

                <option value="Orthopedics">
                    Orthopedics
                </option>

                <option value="General">
                    General
                </option>

            </select>

            <label for="age">Age</label>

            <input
                type="number"
                id="age"
                name="age"
                min="1"
                max="120"
                required
            >

            <button type="submit">
                Save Patient Record
            </button>

        </form>

    </div>

</div>

</body>

</html>