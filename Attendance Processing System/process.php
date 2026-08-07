<!DOCTYPE html>
<html>
<head>
<title>Attendance Report</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
<div class="result">
<?php

function calculatePercentage($present,$total)
{
    return ($present/$total)*100;
}

function checkEligibility($percentage)
{
    if($percentage>=75)
    {
        return "Eligible for Examination";
    }
    else
    {
        return "Not Eligible for Examination";
    }
}

if(isset($_POST['name']))
{
    $name=$_POST['name'];
    $regno=$_POST['regno'];
    $total=$_POST['total'];
    $present=$_POST['present'];

    if($present>$total)
    {
        echo "<h2>Invalid Attendance Data</h2>";
        exit();
    }

    $percentage=calculatePercentage($present,$total);
    $status=checkEligibility($percentage);

    echo "<h2>Attendance Report</h2>";

    echo "<table>";

    echo "<tr><td>Student Name</td><td>$name</td></tr>";
    echo "<tr><td>Register Number</td><td>$regno</td></tr>";
    echo "<tr><td>Total Working Days</td><td>$total</td></tr>";
    echo "<tr><td>Days Present</td><td>$present</td></tr>";
    echo "<tr><td>Attendance Percentage</td><td>".round($percentage,2)."%</td></tr>";
    echo "<tr><td>Exam Status</td><td>$status</td></tr>";

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