<?php
require_once 'connection.php';


echo "<h3> Add a Product </h3><br />";
echo "<form method='post' action='add_products.php'>";
echo "<table style='border: solid 1px black;'>";
echo "<tbody>";
    	echo "<tr><td>Product Name</td>";
    	echo "<td><input type='text' name='productname' size='15'></td></tr>";
    	echo "<tr><td>Shoe ID</td>";
    	echo "<td><input type='text' name='shoeid' size='15'></td></tr>";
    	echo "<tr><td>Clothes ID</td>";
    	echo "<td><input type='text' name='clothesid' size='15'></td></tr>";
    	echo "<tr><td>Brand</td>";
    	echo "<td><input type='text' name='brand' size='15'></td></tr>";
    	echo "<tr><td>Condition</td>";
    	echo "<td><select name='condition'>";
		echo "<option value='default' selected>Select Condition</option>";
		echo "<option value='new'>New</option>";
  		echo "<option value='used'>Used</option>";
  		echo "</select></td></tr>";
        echo "<tr><td>Price</td>";
        echo "<td><input type='text' name='price' size='10'></td></tr>";
        echo "<tr><td>Color</td>";
        echo "<td><input type='text' name='colorway' size='10'></td></tr>";
        echo "<tr><td>Type</td>";
        echo "<td><input type='text' name='type' size='15'></td></tr>";
        echo "<tr><td>Gender</td>";
        echo "<td><select name='gender'>";
		echo "<option value='default' selected>Select Gender</option>";
		echo "<option value='male'>Male</option>";
  		echo "<option value='female'>Female</option>";
  		echo "<option value='unisex'>Unisex</option>";
  		echo "<option value='kids'>Kids</option>";
  		echo "</select></td></tr>";
        echo "<tr><td> <br /> </td></tr>";
        echo "<tr><td><input type='submit' name='submit' value='Submit'></td></tr>";
echo "</tbody>";
echo "</table>";
echo "</form>";



if(isset($_POST['submit'])){
    
    $stmt = $conn->prepare("INSERT INTO product (product_name, shoeID, clothesID, brand, product_condition, price, colorway, type, gender) 
                            VALUES (:product_name, :shoe_id, :clothes_id, :brand_name, :product_condition, :product_price, :product_color, :product_type, :product_gender)");
    
    $stmt->bindValue(':product_name', $_POST['productname']);
    $stmt->bindValue(':shoe_id', $_POST['shoeid']);
    $stmt->bindValue(':clothes_id', $_POST['clothesid']);
    $stmt->bindValue(':brand_name', $_POST['brand']);
    $stmt->bindValue(':product_condition', $_POST['condition']);
    $stmt->bindValue(':product_price', $_POST['price']);
    $stmt->bindValue(':product_color', $_POST['colorway']);
    $stmt->bindValue(':product_type', $_POST['type']);
    $stmt->bindValue(':product_gender', $_POST['gender']);
    
    if($_POST['shoeid'] == ' '){
        $stmt->bindValue(':shoe_id', NULL, PDO::PARAM_STR);    
    }
    if($_POST['clothesid'] == ' '){
        $stmt->bindValue(':clothes_id', NULL, PDO::PARAM_STR);
    }
    echo "<h4> Data Inserted successfully...!! </h4>";
    
}

?>