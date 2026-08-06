<?php
if($_SERVER["REQUEST_METHOD"]!="POST"){
header("Location:index.html");
exit();
}
$name=trim($_POST["name"]);
$email=trim($_POST["email"]);
$mobile=trim($_POST["mobile"]);
$password=$_POST["password"];
$confirm=$_POST["confirm"];
$errors=[];
if(empty($name)){
$errors[]="Name is required.";
}
if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
$errors[]="Invalid email address.";
}
if(!preg_match("/^[0-9]{10}$/",$mobile)){
$errors[]="Mobile number must contain 10 digits.";
}
if(strlen($password)<8){
$errors[]="Password must contain at least 8 characters.";
}
if(!preg_match("/[A-Z]/",$password)){
$errors[]="Password must contain one uppercase letter.";
}
if(!preg_match("/[0-9]/",$password)){
$errors[]="Password must contain one number.";
}
if($password!=$confirm){
$errors[]="Passwords do not match.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>Validation Result</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="result">
<?php if(count($errors)>0){ ?>
<h1>Validation Failed</h1>
<div class="error">
<?php foreach($errors as $error){ ?>
<p><?php echo $error;?></p>
<?php } ?>
</div>
<a href="index.html"><button>Try Again</button></a>
<?php }else{ ?>
<h1>Application Verified</h1>
<div class="details">
<p><b>Name:</b><?php echo htmlspecialchars($name);?></p>
<p><b>Email:</b><?php echo htmlspecialchars($email);?></p>
<p><b>Mobile:</b><?php echo htmlspecialchars($mobile);?></p>
<p><b>Status:</b>Application Accepted</p>
</div>
<a href="index.html"><button>New Application</button></a>
<?php } ?>
</div>
</body>
</html>