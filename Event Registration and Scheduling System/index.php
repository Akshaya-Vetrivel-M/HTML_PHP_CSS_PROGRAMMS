<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Event Registration</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

    <div class="card">

        <h1>Event Registration</h1>

        <p class="description">
            Register for an event and view the scheduled event details.
        </p>

        <form action="process.php" method="post">

            <div class="form-group">

                <label for="name">
                    Participant Name
                </label>

                <input
                    type="text"
                    id="name"
                    name="name"
                    placeholder="Enter your name"
                    required
                >

            </div>

            <div class="form-group">

                <label for="email">
                    Email Address
                </label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    placeholder="Enter your email"
                    required
                >

            </div>

            <div class="form-group">

                <label for="event">
                    Select Event
                </label>

                <select id="event" name="event" required>

                    <option value="">
                        -- Select Event --
                    </option>

                    <option value="Web Development Workshop">
                        Web Development Workshop
                    </option>

                    <option value="PHP Programming Seminar">
                        PHP Programming Seminar
                    </option>

                    <option value="Career Guidance Program">
                        Career Guidance Program
                    </option>

                </select>

            </div>

            <div class="form-group">

                <label for="event_date">
                    Event Date
                </label>

                <input
                    type="date"
                    id="event_date"
                    name="event_date"
                    required
                >

            </div>

            <button type="submit">
                Register for Event
            </button>

        </form>

    </div>

</div>

</body>

</html>