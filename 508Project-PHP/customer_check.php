<?php
require_once 'connection.php';

echo "<div align = 'center'>";
echo "<h3> Enter Customer Phone Number. </h3><br />";   

echo "<form method='post' action='customer_check.php'>";

echo "<label>Phone Number: </label><br />";
echo "<input type='text' name='phone_number' size='12'><br /><br />";
echo "<input type='submit' name='submit' value='CHECK'>";
echo "</form>";

if(isset($_POST['submit'])){
    
    $phone = $_POST['phone_number'];
    $query = $conn->prepare("SELECT * FROM customer WHERE customer_phone='$phone'");
    $query->execute();
    $result = $query->fetch();
    
    if($result){
        echo "<h4 style='color:green;'><b> Customer already Exits</b></h4><br />";
        echo "<h4> Do you want to make any transaction? Click 'Make Transaction'.</h4><br />";
        echo "<a href='add_transaction.php'> Make Transaction </a><br />";
    }
    else{
        echo "<h4 style='color:red;'><b> Customer does not Exits</b></h4><br />";
        echo "<h4> Do you want to add the Customer and Transaction? Click 'Add to Records'.</h4><br />";
        echo "<a href='add_customer_transaction.php'> Add to Records. </a><br />";
    }
}
echo "</div>";
?>


<html>
<body>
<div align = "center">
	<br />
	<a href="index.php"> Go Back to Main Page </a>
</div>
</body>
</html>