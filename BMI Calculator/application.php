<!DOCTYPE html>
<html>
<head>
<title>BMI Calculator</title>
<style>
body{
font-family:Arial,sans-serif;
background:#f2f2f2;
margin:0;
padding:0;
}
.container{
width:400px;
margin:50px auto;
background:white;
padding:25px;
border-radius:10px;
box-shadow:0 0 10px #aaa;
}
h2{
text-align:center;
color:#333;
}
label{
font-weight:bold;
}
input{
width:100%;
padding:10px;
margin:8px 0 15px;
border:1px solid #ccc;
border-radius:5px;
}
button{
width:100%;
padding:10px;
background:#007bff;
color:white;
border:none;
border-radius:5px;
font-size:16px;
cursor:pointer;
}
button:hover{
background:#0056b3;
}
.result{
margin-top:20px;
padding:15px;
background:#e9f7ef;
border-radius:5px;
}
</style>
</head>
<body>
<div class="container">
<h2>BMI Calculator</h2>
<form method="post">
<label>Height (cm)</label>
<input type="number" name="height" placeholder="Enter height in cm" required>
<label>Weight (kg)</label>
<input type="number" name="weight" placeholder="Enter weight in kg" required>
<button type="submit">Calculate BMI</button>
</form>
<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
$height=$_POST["height"];
$weight=$_POST["weight"];
if($height>0 && $weight>0){
$heightMeter=$height/100;
$bmi=$weight/($heightMeter*$heightMeter);
$bmi=round($bmi,2);
if($bmi<18.5){
$status="Underweight";
$recommendation="Increase calorie intake with a balanced diet and consult a nutritionist if needed.";
}
elseif($bmi>=18.5 && $bmi<24.9){
$status="Normal Weight";
$recommendation="Maintain your healthy lifestyle with regular exercise and a balanced diet.";
}
elseif($bmi>=25 && $bmi<29.9){
$status="Overweight";
$recommendation="Focus on regular physical activity and reduce excess calories.";
}
else{
$status="Obese";
$recommendation="Follow a healthy weight management plan and consider consulting a healthcare professional.";
}
echo "<div class='result'>";
echo "<h3>Your BMI Result</h3>";
echo "Height: ".$height." cm<br>";
echo "Weight: ".$weight." kg<br>";
echo "BMI: ".$bmi."<br>";
echo "Health Status: ".$status."<br>";
echo "Recommendation: ".$recommendation;
echo "</div>";
}
else{
echo "<div class='result'>Please enter valid height and weight.</div>";
}
}
?>
</div>
</body>
</html>