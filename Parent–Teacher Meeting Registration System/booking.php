<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Meeting Confirmation</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="confirmation-page">
<?php
function generateAppointmentID(){
return "PTM".rand(10000,99999);
}
if(isset($_POST['parent'])){
$parent=$_POST['parent'];
$student=$_POST['student'];
$class=$_POST['class'];
$teacher=$_POST['teacher'];
$date=$_POST['date'];
$slot=$_POST['slot'];
$purpose=$_POST['purpose'];
if(empty($parent)||empty($student)||empty($purpose)){
echo "<div class='error'>Please complete all details</div>";
exit();
}
$id=generateAppointmentID();
?>
<div class="ticket">
<div class="ticket-header">
<h1>Appointment Confirmed</h1>
<p>Parent Teacher Meeting</p>
</div>
<div class="appointment-id">
<p>Appointment ID</p>
<h1><?php echo $id;?></h1>
</div>
<div class="details">
<div class="detail-box">
<h3>Parent Information</h3>
<p><b>Parent:</b> <?php echo $parent;?></p>
<p><b>Student:</b> <?php echo $student;?></p>
<p><b>Class:</b> <?php echo $class;?></p>
</div>
<div class="detail-box">
<h3>Meeting Information</h3>
<p><b>Teacher:</b> <?php echo $teacher;?></p>
<p><b>Date:</b> <?php echo $date;?></p>
<p><b>Time:</b> <?php echo $slot;?></p>
</div>
</div>
<div class="purpose">
<h3>Meeting Purpose</h3>
<p><?php echo $purpose;?></p>
</div>
<a href="index.html">Book Another Meeting</a>
</div>
<?php
}else{
echo "<div class='error'>No appointment data received</div>";
}
?>
</div>
</body>
</html>