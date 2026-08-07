<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Evaluation Result</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="result-page">

<?php

function calculateAverage($quality,$teamwork,$punctuality,$skill)
{
return ($quality+$teamwork+$punctuality+$skill)/4;
}


function getRating($average)
{

if($average>=90)
{
return "Excellent";
}
else if($average>=75)
{
return "Very Good";
}
else if($average>=60)
{
return "Good";
}
else if($average>=40)
{
return "Average";
}
else
{
return "Needs Improvement";
}

}


if(isset($_POST['name']))
{

$name=$_POST['name'];
$id=$_POST['id'];

$quality=$_POST['quality'];
$teamwork=$_POST['teamwork'];
$punctuality=$_POST['punctuality'];
$skill=$_POST['skill'];


if($quality>100 || $teamwork>100 || $punctuality>100 || $skill>100)
{
echo "<div class='error'>Scores cannot be above 100</div>";
exit();
}


$average=calculateAverage(
$quality,
$teamwork,
$punctuality,
$skill
);


$rating=getRating($average);


?>


<div class="report">

<div class="report-header">
<h1>Performance Report</h1>
<p>Employee Evaluation Summary</p>
</div>


<div class="employee">

<h3><?php echo $name; ?></h3>
<p>Employee ID : <?php echo $id; ?></p>

</div>


<div class="scores">

<div>
<h4>Quality</h4>
<p><?php echo $quality; ?>%</p>
</div>

<div>
<h4>Teamwork</h4>
<p><?php echo $teamwork; ?>%</p>
</div>

<div>
<h4>Punctuality</h4>
<p><?php echo $punctuality; ?>%</p>
</div>

<div>
<h4>Skills</h4>
<p><?php echo $skill; ?>%</p>
</div>

</div>


<div class="final">

<h2>Overall Score</h2>
<h1><?php echo round($average,2); ?>%</h1>

<h2>Rating : <?php echo $rating; ?></h2>

</div>


<a href="index.html">Evaluate Another Employee</a>


</div>


<?php

}
else
{
echo "<div class='error'>No Data Found</div>";
}

?>

</div>

</body>
</html>