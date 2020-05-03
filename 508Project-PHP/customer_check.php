<?php
require_once 'connection.php';

echo "<div align = 'center'>";
echo "<h3> Enter Customer Phone Number. </h3><br />";   

echo "<form method='post' action='customer_check.php'>";

echo "<label>Phone Number: </label>";
echo "<input type='text' name='phone_number' size='12'><br />";
echo "<input type='submit' name='submit' value='CHECK'>";
echo "</form>";

if(isset($_POST['submit'])){
    
    $phone = $_POST['phone_number'];
    $query = $conn->prepare("SELECT * FROM customer WHERE customer_phone='$phone'");
    $query->execute();
    $result = $query->fetch();
    
    if($result){
        echo "Customer already Exits";
    }
    else{
        echo "<a href='buying_product.php'> Add Customer and Create Transaction. </a>";
    }
}
echo "</div>";
?>