<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Secure Password Generator</title>

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial, sans-serif;
        }

        body{
            background:linear-gradient(135deg,#4facfe,#00f2fe);
            display:flex;
            justify-content:center;
            align-items:center;
            height:100vh;
        }

        .container{
            width:420px;
            background:#fff;
            padding:30px;
            border-radius:10px;
            box-shadow:0 8px 20px rgba(0,0,0,0.2);
            text-align:center;
        }

        h2{
            color:#333;
            margin-bottom:20px;
        }

        label{
            font-weight:bold;
            display:block;
            margin-bottom:8px;
            text-align:left;
        }

        input[type=number]{
            width:100%;
            padding:10px;
            margin-bottom:20px;
            border:1px solid #ccc;
            border-radius:5px;
            font-size:16px;
        }

        button{
            width:100%;
            padding:12px;
            background:#007BFF;
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
            margin-top:25px;
            background:#e8f5e9;
            border-left:5px solid green;
            padding:15px;
            word-wrap:break-word;
        }

        .password{
            font-size:18px;
            color:#0d6efd;
            font-weight:bold;
            margin-top:10px;
        }
    </style>
</head>

<body>

<div class="container">

    <h2>🔐 Secure Password Generator</h2>

    <form method="POST">

        <label>Enter Password Length</label>

        <input type="number" name="length" min="8" max="30" value="12" required>

        <button type="submit">Generate Password</button>

    </form>

<?php

if(isset($_POST['length']))
{
    $length = $_POST['length'];

    $uppercase = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $lowercase = "abcdefghijklmnopqrstuvwxyz";
    $numbers = "0123456789";
    $special = "!@#$%^&*()_-+=<>?";

    // One character from each set
    $password = "";
    $password .= $uppercase[random_int(0, strlen($uppercase)-1)];
    $password .= $lowercase[random_int(0, strlen($lowercase)-1)];
    $password .= $numbers[random_int(0, strlen($numbers)-1)];
    $password .= $special[random_int(0, strlen($special)-1)];

    $all = $uppercase.$lowercase.$numbers.$special;

    // Remaining characters
    for($i=4; $i<$length; $i++)
    {
        $password .= $all[random_int(0, strlen($all)-1)];
    }

    // Shuffle password
    $password = str_shuffle($password);

    echo "<div class='result'>";
    echo "<h3>Your Secure Password</h3>";
    echo "<div class='password'>$password</div>";
    echo "</div>";
}

?>

</div>

</body>
</html>