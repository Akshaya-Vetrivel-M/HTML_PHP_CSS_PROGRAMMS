<?php
if($_SERVER["REQUEST_METHOD"]!="POST"){
header("Location:index.html");
exit();
}
function calculateBill($units){
$amount=0;
if($units<=100){
$amount=$units*1.5;
}
elseif($units<=200){
$amount=(100*1.5)+(($units-100)*2.5);
}
elseif($units<=500){
$amount=(100*1.5)+(100*2.5)+(($units-200)*4);
}
else{
$amount=(100*1.5)+(100*2.5)+(300*4)+(($units-500)*6);
}
return $amount;
}
$name=trim($_POST["name"]);
$number=trim($_POST["number"]);
$units=$_POST["units"];
if(empty($name)||empty($number)||$units<0){
die("Invalid details entered.");
}
$energyCharge=calculateBill($units);
$fixedCharge=50;
$total=$energyCharge+$fixedCharge;
$billNo="EB".date("Ymd").rand(1000,9999);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>Electricity Bill</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="bill">
<h1>Electricity Bill</h1>
<h2>Energy Department</h2>
<div class="details">
<p><b>Bill Number:</b><?php echo $billNo;?></p>
<p><b>Consumer Name:</b><?php echo htmlspecialchars($name);?></p>
<p><b>Consumer Number:</b><?php echo htmlspecialchars($number);?></p>
<p><b>Units Consumed:</b><?php echo $units;?> Units</p>
</div>
<table>
<tr>
<th>Description</th>
<th>Amount</th>
</tr>
<tr>
<td>Energy Charges</td>
<td>₹<?php echo number_format($energyCharge,2);?></td>
</tr>
<tr>
<td>Fixed Charges</td>
<td>₹<?php echo number_format($fixedCharge,2);?></td>
</tr>
<tr>
<td>Total Bill Amount</td>
<td>₹<?php echo number_format($total,2);?></td>
</tr>
</table>
<button onclick="window.print()">Print Bill</button>
<a href="index.html"><button>New Bill</button></a>
</div>
</body>
</html>