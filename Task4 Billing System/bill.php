<?php

if($_SERVER["REQUEST_METHOD"]!="POST"){
header("Location:index.html");
exit();
}

$customer=$_POST["customer"];
$mobile=$_POST["mobile"];

$products=$_POST["product"];
$qty=$_POST["qty"];
$price=$_POST["price"];

$discount=$_POST["discount"];
$tax=$_POST["tax"];

$subtotal=0;
$items=[];


for($i=0;$i<count($products);$i++){

if(!empty($products[$i])){

$total=$qty[$i]*$price[$i];

$subtotal=$subtotal+$total;

$items[]=[
"name"=>$products[$i],
"qty"=>$qty[$i],
"price"=>$price[$i],
"total"=>$total
];

}

}


$discountAmount=($subtotal*$discount)/100;

$afterDiscount=$subtotal-$discountAmount;

$taxAmount=($afterDiscount*$tax)/100;

$finalAmount=$afterDiscount+$taxAmount;


$invoiceNo="FM".date("Ymd").rand(1000,9999);

?>

<!DOCTYPE html>

<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width,initial-scale=1.0">

<title>FreshMart Invoice</title>

<link rel="stylesheet" href="style.css">

</head>


<body>


<div class="invoice">


<h1>FreshMart Supermarket</h1>

<h2>Customer Invoice</h2>


<div class="details">

<p><b>Invoice No:</b> <?php echo $invoiceNo;?></p>

<p><b>Date:</b> <?php echo date("d-m-Y");?></p>

<p><b>Customer:</b> <?php echo htmlspecialchars($customer);?></p>

<p><b>Mobile:</b> <?php echo htmlspecialchars($mobile);?></p>

</div>



<table>

<tr>

<th>Product</th>

<th>Quantity</th>

<th>Price</th>

<th>Total</th>

</tr>



<?php foreach($items as $item){ ?>

<tr>

<td>
<?php echo htmlspecialchars($item["name"]);?>
</td>


<td>
<?php echo $item["qty"];?>
</td>


<td>
₹<?php echo number_format($item["price"],2);?>
</td>


<td>
₹<?php echo number_format($item["total"],2);?>
</td>


</tr>


<?php } ?>


</table>




<div class="bill-summary">


<p>
Subtotal:
₹<?php echo number_format($subtotal,2);?>
</p>


<p>
Discount (<?php echo $discount;?>%):
₹<?php echo number_format($discountAmount,2);?>
</p>


<p>
GST (<?php echo $tax;?>%):
₹<?php echo number_format($taxAmount,2);?>
</p>



<h3>
Final Amount:
₹<?php echo number_format($finalAmount,2);?>
</h3>


</div>

<button onclick="window.print()">
Print Invoice
</button>


<a href="index.html">

<button>
New Bill
</button>

</a>

</div>

</body>

</html>