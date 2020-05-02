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


// echo "<tr><td>Brand</td>";
// echo "<td><input type='text' name='brand' size='15'></td></tr>";
// echo "<tr><td>Condition</td>";
// echo "<td><select name='condition'>";
// echo "<option value='default' selected>Select Condition</option>";
// echo "<option value='new'>New</option>";
// echo "<option value='used'>Used</option>";
// echo "</select></td></tr>";
// echo "<tr><td>Price</td>";
// echo "<td><input type='text' name='price' size='10'></td></tr>";
// echo "<tr><td>Color</td>";
// echo "<td><input type='text' name='colorway' size='10'></td></tr>";
// echo "<tr><td>Type</td>";
// echo "<td><input type='text' name='type' size='15'></td></tr>";
// echo "<tr><td>Gender</td>";
// echo "<td><select name='gender'>";
// echo "<option value='default' selected>Select Gender</option>";
// echo "<option value='male'>Male</option>";
// echo "<option value='female'>Female</option>";
// echo "<option value='unisex'>Unisex</option>";
// echo "<option value='kids'>Kids</option>";
// echo "</select></td></tr>";
// echo "<tr><td> <br /> </td></tr>";
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

    
    
//     if($_POST['shoeid'] == ' '){
//         $stmt->bindValue(':shoe_id', NULL, PDO::PARAM_STR);
//     }
//     if($_POST['clothesid'] == ' '){
//         $stmt->bindValue(':clothes_id', NULL, PDO::PARAM_STR);
//     }
    
    $stmt->execute();
    
    echo "<h4> Data Inserted successfully...!! </h4>";
    
}

?>