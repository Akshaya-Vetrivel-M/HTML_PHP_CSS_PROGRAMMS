<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login System</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

    <div class="login-card">

        <h1>User Login</h1>

        <p>Enter your username and password.</p>

        <form action="login.php" method="post">

            <label for="username">Username</label>

            <input
                type="text"
                id="username"
                name="username"
                required
            >

            <label for="password">Password</label>

            <input
                type="password"
                id="password"
                name="password"
                required
            >

            <button type="submit">
                Login
            </button>

        </form>

        <div class="demo-box">
            <strong>Demo Login</strong>
            <br>
            Username: admin
            <br>
            Password: 12345
        </div>

    </div>

</div>

</body>

</html>