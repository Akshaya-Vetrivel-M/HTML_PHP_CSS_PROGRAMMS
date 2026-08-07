<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Salary Report</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
<div class="result">
<?php

function calculateHRA($basic,$percentage)
{
return ($basic*$percentage)/100;
}

function calculateDA($basic,$percentage)
{
return ($basic*$percentage)/100;
}

function calculateGrossSalary($basic,$hra,$da)
{
return $basic+$hra+$da;
}

function calculateDeduction($gross,$percentage)
{
return ($gross*$percentage)/100;
}

function calculateNetSalary($gross,$deduction)
{
return $gross-$deduction;
}

if(isset($_POST['name']))
{

$name=$_POST['name'];
$id=$_POST['id'];
$basic=$_POST['basic'];
$hraPercent=$_POST['hra'];
$daPercent=$_POST['da'];
$deductionPercent=$_POST['deduction'];

$hra=calculateHRA($basic,$hraPercent);
$da=calculateDA($basic,$daPercent);

$gross=calculateGrossSalary($basic,$hra,$da);

$deduction=calculateDeduction($gross,$deductionPercent);

$net=calculateNetSalary($gross,$deduction);

echo "<h2>Salary Report</h2>";

echo "<table>";

echo "<tr><td>Employee Name</td><td>$name</td></tr>";
echo "<tr><td>Employee ID</td><td>$id</td></tr>";
echo "<tr><td>Basic Salary</td><td>₹ $basic</td></tr>";
echo "<tr><td>HRA Amount</td><td>₹ ".round($hra,2)."</td></tr>";
echo "<tr><td>DA Amount</td><td>₹ ".round($da,2)."</td></tr>";
echo "<tr><td>Gross Salary</td><td>₹ ".round($gross,2)."</td></tr>";
echo "<tr><td>Total Deduction</td><td>₹ ".round($deduction,2)."</td></tr>";
echo "<tr><td>Net Salary</td><td>₹ ".round($net,2)."</td></tr>";

echo "</table>";

echo "<a href='index.html'>Back</a>";

}
else
{
echo "<h2>No Data Found</h2>";
}

?>
</div>
</div>
</body>
</html>