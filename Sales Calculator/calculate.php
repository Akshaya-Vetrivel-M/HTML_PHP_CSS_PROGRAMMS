<?php
if($_SERVER["REQUEST_METHOD"]!="POST"){
header("Location:index.html");
exit();
}
function calculateSales($quantity,$price){
return $quantity*$price;
}
$product=trim($_POST["product"]);
$quantity=$_POST["quantity"];
$price=$_POST["price"];
if(empty($product)||$quantity<=0||$price<=0){
die("Invalid product details.");
}
$total=calculateSales($quantity,$price);
$saleId="SALE".rand(10000,99999);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>Sales Report</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="report">
<h1>Sales Report</h1>
<div class="details">
<p><b>Sale ID:</b><?php echo $saleId;?></p>
<p><b>Product Name:</b><?php echo htmlspecialchars($product);?></p>
<p><b>Quantity:</b><?php echo $quantity;?></p>
<p><b>Price Per Item:</b>₹<?php echo number_format($price,2);?></p>
<p><b>Total Sales Value:</b>₹<?php echo number_format($total,2);?></p>
</div>
<a href="index.html"><button>New Calculation</button></a>
<button onclick="window.print()">Print Report</button>
</div>
</body>
</html>