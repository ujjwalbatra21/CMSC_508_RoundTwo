<?php
require_once 'connection.php';

echo "<h3> Add a Customer </h3><br />";
echo "<form method='post' action='add_customer.php'>";
echo "<table style='border: solid 1px black;'>";
echo "<tbody>";
echo "<tr><td>Customer Name</td>";
echo "<td><input type='text' name='customer_name' size='15'></td></tr>";
echo "<tr><td>Address</td>";
echo "<td><input type='text' name='customer_address' size='15'></td></tr>";
echo "<tr><td>Phone Number</td>";
echo "<td><input type='text' name='customer_phone' size='15'></td></tr>";
echo "<tr><td><input type='submit' name='submit' value='Submit'></td></tr>";
echo "</tbody>";
echo "</table>";
echo "</form>";

if(isset($_POST['submit'])){
    
    $stmt = $conn->prepare("INSERT INTO customer (customer_name, customer_address, customer_phone)
                            VALUES (:customer_name, :customer_address, :customer_phone)");
    
    $stmt->bindValue(':customer_name', $_POST['customer_name']);
    $stmt->bindValue(':customer_address', $_POST['customer_address']);
    $stmt->bindValue(':customer_phone', $_POST['customer_phone']);
    
    $stmt->execute();
    
    echo "<h4> Registered Successfully! </h4>";  
}

?>