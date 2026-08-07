<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Employee Profile</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="profile-page">

<?php

function checkPhone($phone)
{
return preg_match("/^[0-9]{10}$/",$phone);
}

function checkID($id)
{
return preg_match("/^EMP[0-9]+$/",$id);
}


if(isset($_POST['name']))
{

$name=$_POST['name'];
$id=$_POST['id'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$department=$_POST['department'];
$designation=$_POST['designation'];
$joining=$_POST['joining'];


if(!filter_var($email,FILTER_VALIDATE_EMAIL))
{
echo "<div class='error'>Invalid Email Address</div>";
exit();
}


if(!checkPhone($phone))
{
echo "<div class='error'>Invalid Phone Number</div>";
exit();
}


if(!checkID($id))
{
echo "<div class='error'>Employee ID must be like EMP101</div>";
exit();
}


?>

<div class="profile-card">

<div class="profile-header">
<h1>Employee Profile</h1>
<p><?php echo $designation; ?></p>
</div>


<div class="details">

<div class="section">

<h3>Personal Information</h3>

<p><b>Name:</b> <?php echo $name; ?></p>
<p><b>Employee ID:</b> <?php echo $id; ?></p>
<p><b>Email:</b> <?php echo $email; ?></p>
<p><b>Phone:</b> <?php echo $phone; ?></p>

</div>


<div class="section">

<h3>Work Information</h3>

<p><b>Department:</b> <?php echo $department; ?></p>
<p><b>Designation:</b> <?php echo $designation; ?></p>
<p><b>Date Joined:</b> <?php echo $joining; ?></p>
<p><b>Status:</b> Active Employee</p>

</div>

</div>


<a href="index.html">Create New Profile</a>

</div>


<?php
}
else
{
echo "<div class='error'>No Employee Data Found</div>";
}

?>

</div>

</body>
</html>