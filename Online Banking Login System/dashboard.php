<?php
session_start();

if(!isset($_SESSION["customer_id"])){
header("Location:index.html");
exit();
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Customer Dashboard</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
<div class="dashboard">
<h1>Welcome to SecureBank</h1>
<div class="profile">
<h2>Customer Information</h2>
<p><b>Customer ID:</b> SB1001</p>
<p><b>Name:</b> Rahul Kumar</p>
<p><b>Account Type:</b> Savings Account</p>
<p><b>Account Number:</b> XXXX XXXX 4589</p>
<p><b>Available Balance:</b> ₹85,450</p>
<p><b>Branch:</b> Chennai Main Branch</p>
</div>
<div class="transaction">
<h2>Recent Transactions</h2>
<p>UPI Payment - ₹500</p>
<p>ATM Withdrawal - ₹2000</p>
<p>Salary Credit - ₹45,000</p>
</div>
<a href="index.html">Logout</a>
</div>
</div>
</body>
</html>