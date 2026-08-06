<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>Student Registration Portal</title>

<style>
*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Segoe UI',sans-serif;
}
body{
background:linear-gradient(135deg,#4facfe,#00f2fe);
min-height:100vh;
display:flex;
justify-content:center;
align-items:center;
padding:20px;
}
.container{
width:1000px;
display:flex;
background:#fff;
border-radius:20px;
overflow:hidden;
box-shadow:0 15px 40px rgba(0,0,0,.25);
}
.left{
width:40%;
background:linear-gradient(135deg,#6a11cb,#2575fc);
color:#fff;
padding:50px 35px;
display:flex;
flex-direction:column;
justify-content:center;
align-items:center;
text-align:center;
}
.left h1{
font-size:40px;
margin-bottom:20px;
}
.left p{
font-size:17px;
line-height:1.8;
}
.left img{
width:120px;
margin-bottom:25px;
}
.right{
width:60%;
padding:35px;
}
#title{
text-align:center;
margin-bottom:25px;
color:#333;
}
label{
display:block;
margin-top:12px;
font-weight:bold;
color:#444;
}
input{
width:100%;
padding:12px;
margin-top:5px;
border:1px solid #ccc;
border-radius:8px;
font-size:15px;
transition:.3s;
}
input:focus{
outline:none;
border-color:#2575fc;
box-shadow:0 0 8px rgba(37,117,252,.4);
}
input[type=submit]{
margin-top:20px;
background:#2575fc;
color:#fff;
border:none;
cursor:pointer;
font-size:17px;
font-weight:bold;
transition:.3s;
}
input[type=submit]:hover{
background:#0d47a1;
transform:translateY(-2px);
}
.result{
margin-top:20px;
padding:15px;
border-radius:10px;
background:#f8f8f8;
}
.success{
color:green;
font-weight:bold;
font-size:20px;
}
.error{
color:red;
font-weight:bold;
}
table{
width:100%;
margin-top:20px;
border-collapse:collapse;
}
table th{
background:#2575fc;
color:white;
padding:10px;
text-align:left;
}
table td{
padding:10px;
border:1px solid #ddd;
}
@media(max-width:900px){
.container{
flex-direction:column;
width:100%;
}
.left,.right{
width:100%;
}
}
</style>

</head>

<body>

<div class="container">

<div class="left">

<img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png">

<h1>Welcome</h1>

<p>
Student Registration Portal
<br><br>
Complete the registration form to create your student account.
<br><br>
✔ Secure Registration
<br>
✔ Fast Validation
<br>
✔ Easy to Use
</p>

</div>

<div class="right">

<h2 id="title">Student Registration Form</h2>

<form method="post">

<label>Full Name</label>
<input type="text" name="name" placeholder="Enter your full name" required>

<label>Email Address</label>
<input type="email" name="email" placeholder="example@gmail.com" required>

<label>Phone Number</label>
<input type="text" name="phone" placeholder="9876543210" required>

<label>Age</label>
<input type="number" name="age" min="18" max="60" placeholder="18-60" required>

<label>Password</label>
<input type="password" name="password" placeholder="Minimum 8 characters" required>

<label>Confirm Password</label>
<input type="password" name="confirm_password" placeholder="Re-enter password" required>

<input type="submit" name="submit" value="Create Account">

</form>

<?php
$name="";
$email="";
$phone="";
$age="";
$password="";
$confirm="";
$errors=array();

if(isset($_POST["submit"]))
{
$name=$_POST["name"];
$email=$_POST["email"];
$phone=$_POST["phone"];
$age=$_POST["age"];
$password=$_POST["password"];
$confirm=$_POST["confirm_password"];
if(empty($name)||empty($email)||empty($phone)||empty($age)||empty($password)||empty($confirm))
{
$errors[]="All fields are required.";
}

elseif(!preg_match("/^[A-Za-z ]+$/",$name))
{
$errors[]="Name should contain only alphabets.";
}

elseif(!filter_var($email,FILTER_VALIDATE_EMAIL))
{
$errors[]="Enter a valid email address.";
}

elseif(!preg_match("/^[0-9]{10}$/",$phone))
{
$errors[]="Phone number must contain exactly 10 digits.";
}

elseif($age<18 || $age>60)
{
$errors[]="Age must be between 18 and 60.";
}

elseif(!preg_match("/^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9]).{8,}$/",$password))
{
$errors[]="Password must contain minimum 8 characters with uppercase, lowercase and number.";
}

elseif($password!=$confirm)
{
$errors[]="Password and Confirm Password do not match.";
}

echo "<div class='result'>";

if(count($errors)>0)
{
echo "<h3 class='error'>Registration Failed</h3>";

foreach($errors as $error)
{
echo "<p class='error'>• ".$error."</p>";
}

}
else
{

echo "<script>
alert('Registration Successful!');
</script>";

echo "<h3 class='success'>✓ Registration Successful</h3>";

echo "<table>";

echo "<tr>
<th>Name</th>
<td>".htmlspecialchars($name)."</td>
</tr>";

echo "<tr>
<th>Email</th>
<td>".htmlspecialchars($email)."</td>
</tr>";

echo "<tr>
<th>Phone</th>
<td>".htmlspecialchars($phone)."</td>
</tr>";

echo "<tr>
<th>Age</th>
<td>".htmlspecialchars($age)."</td>
</tr>";

echo "</table>";

}

echo "</div>";

}

?>

</div>

</div>

</body>
</html>