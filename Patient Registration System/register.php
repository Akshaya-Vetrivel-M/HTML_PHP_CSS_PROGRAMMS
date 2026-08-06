<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>Patient Registration</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<header>
<div class="navbar">
<div class="logo">
<h2>CityCare Hospital</h2>
</div>
<nav>
<a href="index.html">Home</a>
<a href="register.html">Registration</a>
</nav>
</div>
</header>
<div class="container">
<form action="register.php" method="POST">
<h2>Patient Registration Form</h2>
<label>Full Name</label>
<input type="text" name="name" placeholder="Enter patient name" required>
<label>Age</label>
<input type="number" name="age" min="1" max="120" placeholder="Enter age" required>
<label>Gender</label>
<select name="gender" required>
<option value="">Select Gender</option>
<option>Male</option>
<option>Female</option>
<option>Other</option>
</select>
<label>Date of Birth</label>
<input type="date" name="dob" required>
<label>Mobile Number</label>
<input type="tel" name="phone" pattern="[0-9]{10}" placeholder="Enter mobile number" required>
<label>Email Address</label>
<input type="email" name="email" placeholder="Enter email address" required>
<label>Blood Group</label>
<select name="blood" required>
<option value="">Select Blood Group</option>
<option>A+</option>
<option>A-</option>
<option>B+</option>
<option>B-</option>
<option>O+</option>
<option>O-</option>
<option>AB+</option>
<option>AB-</option>
</select>
<label>Address</label>
<textarea name="address" placeholder="Enter complete address" required></textarea>
<label>Medical Condition</label>
<textarea name="problem" placeholder="Describe health issue" required></textarea>
<button type="submit">Submit Registration</button>
</form>
</div>
<footer>
<h3>CityCare Hospital</h3>
<p>Patient Care Portal</p>
</footer>
</body>
</html>