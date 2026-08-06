<?php
function calculateBill($plan,$calls,$data,$sms){
$bill=0;
$planCharge=0;
$extraCall=0;
$extraData=0;
$extraSms=0;

if($plan=="Basic"){
$planCharge=199;
$extraCall=1;
$extraData=20;
$extraSms=0.5;
$freeCall=200;
$freeData=2;
$freeSms=100;
}
elseif($plan=="Premium"){
$planCharge=399;
$extraCall=0.75;
$extraData=15;
$extraSms=0.25;
$freeCall=600;
$freeData=10;
$freeSms=500;
}
else{
$planCharge=699;
$extraCall=0;
$extraData=0;
$extraSms=0;
$freeCall=9999;
$freeData=9999;
$freeSms=9999;
}

$bill=$planCharge;

if($calls>$freeCall){
$bill+=($calls-$freeCall)*$extraCall;
}

if($data>$freeData){
$bill+=($data-$freeData)*$extraData;
}

if($sms>$freeSms){
$bill+=($sms-$freeSms)*$extraSms;
}

return round($bill,2);
}

$name=$_POST["name"];
$mobile=$_POST["mobile"];
$plan=$_POST["plan"];
$calls=$_POST["calls"];
$data=$_POST["data"];
$sms=$_POST["sms"];

$total=calculateBill($plan,$calls,$data,$sms);

?>

<!DOCTYPE html>
<html>
<head>
<title>Mobile Bill Summary</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
<div class="box">
<h1>TeleConnect</h1>
<h2>Mobile Bill Summary</h2>

<div class="result">
<p><b>Customer Name:</b> <?php echo $name; ?></p>
<p><b>Mobile Number:</b> <?php echo $mobile; ?></p>
<p><b>Tariff Plan:</b> <?php echo $plan; ?></p>
<p><b>Call Usage:</b> <?php echo $calls; ?> minutes</p>
<p><b>Internet Usage:</b> <?php echo $data; ?> GB</p>
<p><b>SMS Usage:</b> <?php echo $sms; ?></p>
<h2 class="amount">Total Bill: ₹<?php echo $total; ?></h2>
</div>

<a href="index.html">Generate New Bill</a>

</div>
</div>
</body>
</html>