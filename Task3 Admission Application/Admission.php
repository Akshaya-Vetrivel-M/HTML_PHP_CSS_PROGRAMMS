<?php

if($_SERVER["REQUEST_METHOD"] != "POST")
{
    header("Location: admissions.html");
    exit();
}


$name = trim($_POST["name"]);
$email = trim($_POST["email"]);
$phone = trim($_POST["phone"]);
$dob = $_POST["dob"];
$gender = $_POST["gender"];
$course = $_POST["course"];
$address = trim($_POST["address"]);

if(
empty($name) ||
empty($email) ||
empty($phone) ||
empty($dob) ||
empty($gender) ||
empty($course) ||
empty($address)
)
{
    die("Please fill all required fields.");
}

if(!filter_var($email, FILTER_VALIDATE_EMAIL))
{
    die("Please enter a valid email address.");
}

if(!preg_match("/^[0-9]{10}$/",$phone))
{
    die("Please enter a valid 10 digit mobile number.");
}

$application_id = "ABC" . date("Y") . rand(10000,99999);


?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Admission Acknowledgement</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="ack">

<h2>
Admission Submitted Successfully
</h2>

<p class="success">
Thank you for applying to ABC College of Technology.
</p>

<table>


<tr>

<td>
Application ID
</td>

<td>
<?php echo $application_id; ?>
</td>

</tr>

<tr>

<td>
Applicant Name
</td>

<td>
<?php echo htmlspecialchars($name); ?>
</td>

</tr>

<tr>

<td>
Email Address
</td>

<td>
<?php echo htmlspecialchars($email); ?>
</td>

</tr>

<tr>

<td>
Mobile Number
</td>

<td>
<?php echo htmlspecialchars($phone); ?>
</td>

</tr>

<tr>

<td>
Date of Birth
</td>

<td>
<?php echo htmlspecialchars($dob); ?>
</td>

</tr>

<tr>

<td>
Gender
</td>

<td>
<?php echo htmlspecialchars($gender); ?>
</td>

</tr>

<tr>

<td>
Selected Course
</td>

<td>
<?php echo htmlspecialchars($course); ?>
</td>

</tr>

<tr>

<td>
Address
</td>

<td>
<?php echo htmlspecialchars($address); ?>
</td>

</tr>

<tr>

<td>
Application Status
</td>

<td>
Under Verification
</td>

</tr>
</table>
<div class="actions">
<button onclick="window.print()">
Print Receipt
</button>
<a href="index.html">

<button>
Back To Home
</button>

</a>

</div>

</div>

</body>

</html>