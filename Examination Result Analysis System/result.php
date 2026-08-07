<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Student Result Dashboard</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="result-page">
<?php
function calculatePercentage($total){
return ($total/400)*100;
}
function calculateGrade($percentage){
if($percentage>=90){
return "A+";
}
elseif($percentage>=80){
return "A";
}
elseif($percentage>=70){
return "B";
}
elseif($percentage>=60){
return "C";
}
elseif($percentage>=50){
return "D";
}
else{
return "F";
}
}
function getStatus($percentage){
if($percentage>=50){
return "PASS";
}
else{
return "FAIL";
}
}
if(isset($_POST['name'])){
$name=$_POST['name'];
$reg=$_POST['regno'];
$math=$_POST['math'];
$physics=$_POST['physics'];
$chem=$_POST['chemistry'];
$computer=$_POST['computer'];
$total=$math+$physics+$chem+$computer;
$percentage=calculatePercentage($total);
$grade=calculateGrade($percentage);
$status=getStatus($percentage);
?>
<div class="dashboard">
<div class="profile">
<h1><?php echo $name;?></h1>
<p>Register No: <?php echo $reg;?></p>
</div>
<div class="cards">
<div class="mark">
<h3>Mathematics</h3>
<strong><?php echo $math;?></strong>
</div>
<div class="mark">
<h3>Physics</h3>
<strong><?php echo $physics;?></strong>
</div>
<div class="mark">
<h3>Chemistry</h3>
<strong><?php echo $chem;?></strong>
</div>
<div class="mark">
<h3>Computer</h3>
<strong><?php echo $computer;?></strong>
</div>
</div>
<div class="summary">
<div>
<p>Total Marks</p>
<h2><?php echo $total;?> / 400</h2>
</div>
<div>
<p>Percentage</p>
<h2><?php echo round($percentage,2);?>%</h2>
</div>
<div>
<p>Grade</p>
<h2><?php echo $grade;?></h2>
</div>
<div>
<p>Status</p>
<h2 class="<?php echo strtolower($status);?>"><?php echo $status;?></h2>
</div>
</div>
<a href="index.html">Create New Result</a>
</div>
<?php
}
else{
echo "<h2>No Data Available</h2>";
}
?>
</div>
</body>
</html>