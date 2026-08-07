<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Customer Profile</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="profile-page">
<?php
function generateCustomerCode(){
return "CL".date("Y").rand(1000,9999);
}
function validatePhone($phone){
return preg_match("/^[0-9]{10}$/",$phone);
}
if(isset($_POST['name'])){
$name=trim($_POST['name']);
$email=trim($_POST['email']);
$phone=trim($_POST['phone']);
$dob=$_POST['dob'];
$category=$_POST['category'];
$city=trim($_POST['city']);
$address=trim($_POST['address']);
if(empty($name)||empty($city)||empty($address)){
echo "<div class='error'>Please fill all required fields</div>";
exit();
}
if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
echo "<div class='error'>Invalid email address</div>";
exit();
}
if(!validatePhone($phone)){
echo "<div class='error'>Phone number must contain 10 digits</div>";
exit();
}
$customerID=generateCustomerCode();
?>
<div class="profile-card">
<div class="profile-top">
<div class="avatar"><?php echo strtoupper(substr($name,0,1));?></div>
<div>
<h1><?php echo $name;?></h1>
<p>Customer ID : <?php echo $customerID;?></p>
</div>
</div>
<div class="status">
<span>Account Created</span>
</div>
<div class="info-grid">
<div class="box">
<h3>Personal Details</h3>
<p><b>Email:</b> <?php echo $email;?></p>
<p><b>Phone:</b> <?php echo $phone;?></p>
<p><b>Date Of Birth:</b> <?php echo $dob;?></p>
</div>
<div class="box">
<h3>Customer Details</h3>
<p><b>Category:</b> <?php echo $category;?></p>
<p><b>City:</b> <?php echo $city;?></p>
<p><b>Address:</b> <?php echo $address;?></p>
</div>
</div>
<a href="index.html">Register New Customer</a>
</div>
<?php
}else{
echo "<div class='error'>No customer information received</div>";
}
?>
</div>
</body>
</html>