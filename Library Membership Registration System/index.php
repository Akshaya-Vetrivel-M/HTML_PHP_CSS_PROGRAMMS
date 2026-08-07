<!DOCTYPE html>
<html>
<head>
<title>Library Membership Registration</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<header>
<h1>City Library</h1>
<nav>
<a href="#">Home</a>
<a href="#">Membership</a>
<a href="#">Contact</a>
</nav>
</header>
<section class="hero">
<h2>Library Membership Registration</h2>
<p>Register as a member and access thousands of books.</p>
</section>
<div class="container">
<form action="register.php" method="post">
<h2>Member Registration Form</h2>
<label>Full Name</label>
<input type="text" name="name" required>
<label>Email Address</label>
<input type="email" name="email" required>
<label>Phone Number</label>
<input type="text" name="phone" pattern="[0-9]{10}" required>
<label>Date of Birth</label>
<input type="date" name="dob" required>
<label>Address</label>
<textarea name="address" required></textarea>
<label>Membership Type</label>
<select name="type" required>
<option value="">Select Membership</option>
<option>Student</option>
<option>General</option>
<option>Premium</option>
</select>
<button type="submit">Register</button>
</form>
</div>
<footer>
<p>© 2026 City Library. All Rights Reserved.</p>
</footer>
</body>
</html>