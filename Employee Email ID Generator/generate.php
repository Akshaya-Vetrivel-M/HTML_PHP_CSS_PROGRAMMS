<?php
if($_SERVER["REQUEST_METHOD"]!="POST"){
header("Location:index.html");
exit();
}
$name=trim($_POST["name"]);
$department=trim($_POST["department"]);
$name=strtolower($name);
$name=str_replace(" ",".",$name);
$words=explode(".",$name);
$first=substr($words[0],0,1);
$last=end($words);
$email=$first.$last."@company.com";
$employeeId="EMP".rand(1000,9999);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>Generated Email ID</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="result">
<h1>Employee Email Details</h1>
<div class="details">
<p><b>Employee ID:</b><?php echo $employeeId;?></p>
<p><b>Employee Name:</b><?php echo htmlspecialchars($_POST["name"]);?></p>
<p><b>Department:</b><?php echo htmlspecialchars($department);?></p>
<p><b>Email ID:</b><?php echo $email;?></p>
</div>
<button onclick="window.print()">Print Details</button>
<a href="index.html"><button>Generate New</button></a>
</div>
</body>
</html>