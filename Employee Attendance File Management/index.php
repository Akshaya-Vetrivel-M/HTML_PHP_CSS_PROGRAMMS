<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Employee Attendance Management</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

    <div class="card">

        <h1>Employee Attendance</h1>

        <p class="description">
            Enter employee attendance details and store them
            in a text file.
        </p>

        <form action="process.php" method="post">

            <div class="form-group">

                <label for="employee_name">
                    Employee Name
                </label>

                <input
                    type="text"
                    id="employee_name"
                    name="employee_name"
                    placeholder="Enter employee name"
                    required
                >

            </div>

            <div class="form-group">

                <label for="employee_id">
                    Employee ID
                </label>

                <input
                    type="text"
                    id="employee_id"
                    name="employee_id"
                    placeholder="Enter employee ID"
                    required
                >

            </div>

            <div class="form-group">

                <label for="attendance_date">
                    Attendance Date
                </label>

                <input
                    type="date"
                    id="attendance_date"
                    name="attendance_date"
                    required
                >

            </div>

            <div class="form-group">

                <label for="status">
                    Attendance Status
                </label>

                <select id="status" name="status" required>

                    <option value="">
                        -- Select Status --
                    </option>

                    <option value="Present">
                        Present
                    </option>

                    <option value="Absent">
                        Absent
                    </option>

                    <option value="Leave">
                        Leave
                    </option>

                </select>

            </div>

            <button type="submit">
                Save Attendance
            </button>

        </form>

    </div>

</div>

</body>

</html>