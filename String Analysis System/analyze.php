<?php
if($_SERVER["REQUEST_METHOD"]!="POST"){
header("Location:index.html");
exit();
}
function countCharacters($text){
$vowels=0;
$consonants=0;
$digits=0;
$special=0;
$text=strtolower($text);
$length=strlen($text);
for($i=0;$i<$length;$i++){
$char=$text[$i];
if(ctype_alpha($char)){
if(str_contains("aeiou",$char)){
$vowels++;
}
else{
$consonants++;
}
}
elseif(ctype_digit($char)){
$digits++;
}
elseif(!ctype_space($char)){
$special++;
}
}
return [$vowels,$consonants,$digits,$special];
}
$text=trim($_POST["text"]);
if(empty($text)){
die("Please enter text.");
}
$result=countCharacters($text);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>Text Analysis Report</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="report">
<h1>String Analysis Report</h1>
<div class="details">
<p><b>Original Text:</b><?php echo htmlspecialchars($text);?></p>
<p><b>Total Characters:</b><?php echo strlen($text);?></p>
<p><b>Vowels:</b><?php echo $result[0];?></p>
<p><b>Consonants:</b><?php echo $result[1];?></p>
<p><b>Digits:</b><?php echo $result[2];?></p>
<p><b>Special Characters:</b><?php echo $result[3];?></p>
</div>
<button onclick="window.print()">Print Report</button>
<a href="index.html"><button>Analyze New Text</button></a>
</div>
</body>
</html>