<?php
require_once 'connection.php';

echo "<div align = 'center'>";
echo "<h3> Enter Customer Phone Number. </h3><br />";

echo "<form method='post' action='buying_product.php'>";

echo "<label>Phone Number: </label>";
echo "<input type='text' name='customer_phone' size='12'>";

echo "</form>";


$phone = $_POST['customer_phone'];
$query = "SELECT * FROM customer WHERE customer_phone=$phone";
$query->execute();
$result = $query->fetch();

if($result){
    echo"Customer Exits";
}
else{
    echo "<a href='buying_product.php'> Add Customer and Create Transaction. </a>";
}

echo "</div>";
?>