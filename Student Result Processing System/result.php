<?php
if($_SERVER["REQUEST_METHOD"]!="POST"){
header("Location:index.html");
exit();
}
function calculateTotal($marks){
return array_sum($marks);
}
function calculateAverage($total,$count){
return $total/$count;
}
function calculateGrade($average){
if($average>=90){
return "A+";
}
elseif($average>=80){
return "A";
}
elseif($average>=70){
return "B";
}
elseif($average>=60){
return "C";
}
elseif($average>=50){
return "D";
}
else{
return "F";
}
}
$name=$_POST["name"];
$regno=$_POST["regno"];
$department=$_POST["department"];
$marks=[
$_POST["mark1"],
$_POST["mark2"],
$_POST["mark3"],
$_POST["mark4"],
$_POST["mark5"]
];
$total=calculateTotal($marks);
$average=calculateAverage($total,count($marks));
$grade=calculateGrade($average);
$status=$average>=50?"PASS":"FAIL";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>Student Result</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="result">
<h1>Student Result Sheet</h1>
<div class="details">
<p><b>Name:</b><?php echo htmlspecialchars($name);?></p>
<p><b>Register Number:</b><?php echo htmlspecialchars($regno);?></p>
<p><b>Department:</b><?php echo htmlspecialchars($department);?></p>
</div>
<table>
<tr>
<th>Subject</th>
<th>Mark</th>
</tr>
<tr>
<td>Subject 1</td>
<td><?php echo $marks[0];?></td>
</tr>
<tr>
<td>Subject 2</td>
<td><?php echo $marks[1];?></td>
</tr>
<tr>
<td>Subject 3</td>
<td><?php echo $marks[2];?></td>
</tr>
<tr>
<td>Subject 4</td>
<td><?php echo $marks[3];?></td>
</tr>
<tr>
<td>Subject 5</td>
<td><?php echo $marks[4];?></td>
</tr>
</table>
<div class="summary">
<p>Total Marks: <?php echo $total;?> / 500</p>
<p>Average: <?php echo number_format($average,2);?>%</p>
<p>Grade: <?php echo $grade;?></p>
<p>Status: <?php echo $status;?></p>
</div>
<button onclick="window.print()">Print Result</button>
<a href="index.html"><button>New Result</button></a>
</div>
</body>
</html>