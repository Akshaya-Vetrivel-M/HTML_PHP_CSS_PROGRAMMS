<?php
if($_SERVER["REQUEST_METHOD"]!="POST"){
header("Location:index.html");
exit();
}
function validatePhone($phone){
return preg_match("/^[0-9]{10}$/",$phone);
}
$name=trim($_POST["name"]);
$email=trim($_POST["email"]);
$phone=trim($_POST["phone"]);
$dob=$_POST["dob"];
$gender=$_POST["gender"];
$course=$_POST["course"];
$address=trim($_POST["address"]);
if(empty($name)||empty($email)||empty($phone)||empty($dob)||empty($gender)||empty($course)||empty($address)){
die("Please fill all required fields.");
}
if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
die("Invalid email address.");
}
if(!validatePhone($phone)){
die("Invalid mobile number.");
}
$registrationId="CR".date("Y").rand(1000,9999);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>Registration Successful</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="result">
<h1>Registration Successful</h1>
<div class="details">
<p><b>Registration ID:</b><?php echo $registrationId;?></p>
<p><b>Name:</b><?php echo htmlspecialchars($name);?></p>
<p><b>Email:</b><?php echo htmlspecialchars($email);?></p>
<p><b>Mobile:</b><?php echo htmlspecialchars($phone);?></p>
<p><b>Date of Birth:</b><?php echo htmlspecialchars($dob);?></p>
<p><b>Gender:</b><?php echo htmlspecialchars($gender);?></p>
<p><b>Course:</b><?php echo htmlspecialchars($course);?></p>
<p><b>Address:</b><?php echo htmlspecialchars($address);?></p>
<p><b>Status:</b>Confirmed</p>
</div>
<button onclick="window.print()">Print Registration</button>
<a href="index.html"><button>New Registration</button></a>
</div>
</body>
</html>