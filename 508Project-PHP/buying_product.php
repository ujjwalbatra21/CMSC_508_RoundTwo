<?php
require_once 'connection.php';

echo "<div align = 'center'>";
echo "<h3> Add Customer and Transaction. </h3><br />";

echo "<form method='post' action='buying_product.php'>";
echo "<table style='border: solid 1px black;'>";
echo "<tbody>";

    echo "<tr><td>Customer Name</td>";
    echo "<td><input type='text' name='customer_name' size='15'></td></tr>";
    echo "<tr><td>Address</td>";
    echo "<td><input type='text' name='customer_address' size='15'></td></tr>";
    echo "<tr><td>Phone Number</td>";
    echo "<td><input type='text' name='customer_phone' size='15'></td></tr>";
    
    echo "<tr><td>Payment Method</td>";
    echo "<td><select name='payment'>";
    echo "<option value='0' selected>No Payment/option>";
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
    $stmt = $conn->prepare("SELECT productID, product_name FROM product");
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
    
    $stmt = $conn->prepare("INSERT INTO customer (customer_name, customer_address, customer_phone)
                            VALUES (:customer_name, :customer_address, :customer_phone)");
    
    $stmt->bindValue(':customer_name', $_POST['customer_name']);
    $stmt->bindValue(':customer_address', $_POST['customer_address']);
    $stmt->bindValue(':customer_phone', $_POST['customer_phone']);
    
    $stmt->execute();
    
    
    $stmt = $conn->prepare("INSERT INTO transaction (payment_method, date, productID, customer_phone)
                            VALUES (:payment, :date, :product, :customer_phone)");
    
    if($_POST['payment'] == 1){
        $stmt->bindValue(':payment', 'CASH');
    }
    if($_POST['payment'] == 2){
        $str1 = "CC";
        $str2 = $_POST('[type]');
        $stmt->bindValue(':payment', $str1.$str2);
    }
    
    $stmt->bindValue(':date', $_POST['transaction_date']);
    if($_POST['product'] != -1){
        $stmt->bindValue(':product', $_POST['product']);
    }
    $stmt->bindValue(':customer_phone', $_POST['customer_phone']);
    
    $stmt->execute();
}

?>