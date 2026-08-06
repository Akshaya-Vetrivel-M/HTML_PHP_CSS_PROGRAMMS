<?php
$customer_id=$_POST["customer_id"];
$password=$_POST["password"];

$valid_id="SB1001";
$valid_password="bank123";

if($customer_id==$valid_id && $password==$valid_password){
session_start();
$_SESSION["customer_id"]=$customer_id;
header("Location:dashboard.php");
}
else{
echo "<html><head><title>Login Failed</title><link rel='stylesheet' href='style.css'></head><body>";
echo "<div class='container'><div class='login-box'>";
echo "<h2>Login Failed</h2>";
echo "<p>Invalid Customer ID or Password.</p>";
echo "<a href='index.html'>Try Again</a>";
echo "</div></div>";
echo "</body></html>";
}
?>