<?php

require_once 'connection.php';

echo "<div align = 'center'>";
echo "<h3> Purchase a Product. </h3><br />";

echo "<form method='post' action='add_transaction.php'>";
echo "<table style='border: solid 1px black;'>";
echo "<tbody>";

echo "<tr><td>Phone Number</td>";
echo "<td><input type='text' name='customer_phone' size='15'></td></tr>";

echo "<tr><td>Payment Method</td>";
echo "<td><select name='payment'>";
echo "<option value='0' selected>No Payment</option>";
echo "<option value='1'>Cash</option>";
echo "<option value='2'>Credit Card</option>";
echo "</select></td>";
echo "<td><select name='type'>";
echo "<option value='No Type' selected>No Type</option>";
echo "<option value='VISA'>VISA</option>";
echo "<option value='MC'>MC</option>";
echo "<option value='AMEX'>AMEX</option>";
echo "<option value='DIS'>DISCOVER</option>";
echo "</select></td></tr>";

echo "<tr><td>Transation Date</td>";
echo "<td><input type='date' name='transaction_date'></td></tr>";

echo "<tr><td>Product Name</td>";
$stmt = $conn->prepare("SELECT productID, product_name FROM product WHERE in_stock='In Stock'");
$stmt->execute();
echo "<td><select name='product'>";
echo "<option value='-1'>No Product</option>";
while($row = $stmt->fetch()){
    echo "<option value='$row[productID]'>$row[product_name]</option>";
}
echo "</select></td></tr>";

echo "<tr><td><input type='submit' name='submit' value='DONE'></td></tr>";

echo "</tbody>";
echo "</table>";
echo "</form>";
echo "</div>";

if(isset($_POST['submit'])){
     
    $stmt = $conn->prepare("INSERT INTO transaction (payment_method, date, productID, customer_phone)
                            VALUES (:payment, :date, :product, :customer_phone)");
    
    if($_POST['payment'] == 1){
        $stmt->bindValue(':payment', 'CASH');
    }
    if($_POST['payment'] == 2){
        $str1 = 'CC-';
        $str2 = $_POST['type'];
        $str3 = $str1.$str2;
        $stmt->bindValue(':payment', $str3, PDO::PARAM_STR);
    }
    
    $stmt->bindValue(':date', $_POST['transaction_date']);
    
    if($_POST['product'] != -1){
        $stmt->bindValue(':product', $_POST['product']);
    }
    
    $stmt->bindValue(':customer_phone', $_POST['customer_phone']);
    $stmt->execute();
    
    $product_id = $_POST['product'];
    $stmt = $conn->prepare("UPDATE product SET in_stock='Sold' WHERE productID=$product_id");
    $stmt->execute();
    
    echo "<div align = 'center'>";
    echo "<h4>Success! Transaction added to database.<h4><br />";
    echo "</div>";
}

?>

<html>
<body>
<div align = "center">
	<a href="index.php"> Go Back to Main Page </a>
</div>
</body>
</html>