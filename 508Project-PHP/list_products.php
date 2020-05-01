<html>
<head>
<style>
table, th, td {
  border: 1px solid black;
}
</style>
</head>
<body>

<?php

require_once 'connection.php';

$stmt = $conn->prepare("SELECT product_name, brand, product_condition, price FROM product");
$stmt->execute();


if($stmt->rowCount() > 0){
    echo "<table>";
    echo "<table style='border: solid 1px black;'>";
    echo "<tr>";
   // echo "<tr><th>ID</th><th>Employee Name</th></tr>";
    echo "<tr><th>Name</th><th>Brand</th><th>Condition</th><th>Price</th></tr>";
    echo "</tr>";
    
    echo "<tbody>";
    
    while($row = $stmt->fetch()){
        echo "<tr>";
        echo "<td>" . $row['product_name'] . "</td>";
        echo "<td>" . $row['brand'] . "</td>";
        echo "<td>" . $row['product_condition'] . "</td>";
        echo "<td>" . $row['price'] . "</td>";
        //echo "<td>" . $row['emp_name'] . "</td>";
        echo "</tr>";
    }
    
    echo "</tbody>";
    echo "</table>";
}

else{
    echo "<h4> No Products in the database.</h4>";
}

?>

</body>
</html>