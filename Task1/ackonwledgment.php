<!DOCTYPE html>
<html>
<head>

<title>Customer Invoice</title>

<style>

body{
    background:#eef2f7;
    font-family:Arial;
}

.invoice{
    width:800px;
    margin:30px auto;
    background:white;
    padding:30px;
    border-radius:10px;
    box-shadow:0 0 15px rgba(0,0,0,.2);
}

h2{
    text-align:center;
    color:#1565c0;
}

table{
    width:100%;
    border-collapse:collapse;
    margin-top:20px;
}

th{
    background:#1565c0;
    color:white;
}

th,td{
    border:1px solid #ccc;
    padding:12px;
    text-align:center;
}

.summary{
    width:50%;
    float:right;
    margin-top:20px;
}

.summary td{
    text-align:left;
}

.total{
    background:#1565c0;
    color:white;
    font-weight:bold;
}

.footer{
    clear:both;
    text-align:center;
    margin-top:40px;
    color:green;
    font-size:18px;
}

</style>

</head>

<body>

<?php

if($_SERVER["REQUEST_METHOD"]=="POST")
{

$customer=$_POST['customer'];
$product=$_POST['product'];
$category=$_POST['category'];

$qty=$_POST['qty'];
$price=$_POST['price'];

$discount=$_POST['discount'];
$gst=$_POST['gst'];

$subtotal=$qty*$price;

$discountAmount=($subtotal*$discount)/100;

$afterDiscount=$subtotal-$discountAmount;

$gstAmount=($afterDiscount*$gst)/100;

$grandTotal=$afterDiscount+$gstAmount;

$billNo="INV".rand(1000,9999);

$date=date("d-m-Y");

?>

<div class="invoice">

<h2>🛒 Fresh Mart Supermarket</h2>

<p><strong>Invoice No:</strong> <?php echo $billNo; ?></p>

<p><strong>Date:</strong> <?php echo $date; ?></p>

<p><strong>Customer:</strong> <?php echo $customer; ?></p>

<table>

<tr>

<th>Product</th>

<th>Category</th>

<th>Quantity</th>

<th>Unit Price</th>

<th>Amount</th>

</tr>

<tr>

<td><?php echo $product; ?></td>

<td><?php echo $category; ?></td>

<td><?php echo $qty; ?></td>

<td>₹<?php echo number_format($price,2); ?></td>

<td>₹<?php echo number_format($subtotal,2); ?></td>

</tr>

</table>

<table class="summary">

<tr>
<td>Subtotal</td>
<td>₹<?php echo number_format($subtotal,2); ?></td>
</tr>

<tr>
<td>Discount (<?php echo $discount;?>%)</td>
<td>- ₹<?php echo number_format($discountAmount,2); ?></td>
</tr>

<tr>
<td>GST (<?php echo $gst;?>%)</td>
<td>₹<?php echo number_format($gstAmount,2); ?></td>
</tr>

<tr class="total">
<td>Grand Total</td>
<td>₹<?php echo number_format($grandTotal,2); ?></td>
</tr>

</table>

<div class="footer">

<p>✅ Thank You for Shopping with Fresh Mart!</p>

<p>Please Visit Again.</p>

</div>

</div>

<?php

}

?>

</body>
</html>