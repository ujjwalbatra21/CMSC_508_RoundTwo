<?php
require_once 'connection.php';

echo "<div align='center'>";
echo "<h3> Add a Product </h3><br />";
echo "<form method='post' action='add_products.php'>";
echo "<table style='border: solid 1px black;'>";
echo "<tbody>";
    	echo "<tr><td>Product Name</td>";
    	echo "<td><input type='text' name='productname' size='25'></td></tr>";
    	
    	echo "<tr><td>Shoe ID</td>";
    	echo "<td><input type='text' name='shoeid' size='25' placeholder='Required if Adding Shoes'></td></tr>";
    	
    	echo "<tr><td>Shoe Size</td>";
    	echo "<td><select name='shoesize'>";
    	echo "<option value='-1' selected>No Size</option>";
    	echo "<option value='1.0'>1</option>";
    	echo "<option value='1.5'>1.5</option>";
    	echo "<option value='2.0'>2</option>";
    	echo "<option value='2.5'>2.5</option>";
    	echo "<option value='3.0'>3</option>";
    	echo "<option value='3.5'>3.5</option>";
    	echo "<option value='4.0'>4</option>";
    	echo "<option value='4.5'>4.5</option>";
    	echo "<option value='5.0'>5</option>";
    	echo "<option value='5.5'>5.5</option>";
    	echo "<option value='6.0'>6</option>";
    	echo "<option value='6.5'>6.5</option>";
    	echo "<option value='7.0'>7</option>";
    	echo "<option value='7.5'>7.5</option>";
    	echo "<option value='8.0'>8</option>";
    	echo "<option value='8.5'>8.5</option>";
    	echo "<option value='9.0'>9</option>";
    	echo "<option value='9.5'>9.5</option>";
    	echo "<option value='10.0'>10</option>";
    	echo "<option value='10.5'>10.5</option>";
    	echo "<option value='11.0'>11</option>";
    	echo "<option value='11.5'>11.5</option>";
    	echo "<option value='12.0'>12</option>";
    	echo "<option value='12.5'>12.5</option>";
    	echo "<option value='13.0'>13</option>";
    	echo "</select></td></tr>";
    	
    	echo "<tr><td>Clothes ID</td>";
    	echo "<td><input type='text' name='clothesid' size='25' placeholder='Required if Adding Clothes'></td></tr>";
    	
    	echo "<tr><td>Clothes Size</td>";
    	echo "<td><select name='clothessize'>";
    	echo "<option value='-1' selected>No Size</option>";
    	echo "<option value='XS'>X-Small</option>";
    	echo "<option value='S'>Small</option>";
    	echo "<option value='M'>Medium</option>";
    	echo "<option value='L'>Large</option>";
    	echo "<option value='XL'>X-Large</option>";
    	echo "<option value='XXL'>XX-Large</option>";
    	echo "</select></td></tr>";
    	
    	echo "<tr><td>Brand</td>";
    	echo "<td><input type='text' name='brand' size='15'></td></tr>";
    	
    	echo "<tr><td>Color</td>";
    	echo "<td><input type='text' name='colorway' size='10'></td></tr>";
    	
    	echo "<tr><td>Type</td>";
    	echo "<td><input type='text' name='type' size='15'></td></tr>";
    	
    	echo "<tr><td>Gender</td>";
    	echo "<td><select name='gender'>";
    	echo "<option value='-1' selected>No Gender</option>";
    	echo "<option value='Mens'>Mens</option>";
    	echo "<option value='Women'>Women</option>";
    	echo "<option value='Unisex'>Unisex</option>";
    	echo "<option value='Kids'>Kids</option>";
    	echo "</select></td></tr>";
    	
    	echo "<tr><td>Condition</td>";
    	echo "<td><select name='condition'>";
		echo "<option value='-1' selected>No Condition</option>";
		echo "<option value='New'>New</option>";
  		echo "<option value='Used'>Used</option>";
  		echo "</select></td></tr>";
  		
        echo "<tr><td>Price</td>";
        echo "<td><input type='text' name='price' size='10'></td></tr>";
        
        echo "<tr><td>In Stock</td>";
        echo "<td><select name='instock'>";
        echo "<option value='-1' selected>No Selected</option>";
        echo "<option value='In Stock'>Yes</option>";
        echo "<option value='Sold'>No</option>";
        echo "</select></td></tr>";
        
        echo "<tr><td> <br /> </td></tr>";
        echo "<tr><td><input type='submit' name='submit' value='Submit'></td></tr>";
        
echo "</tbody>";
echo "</table>";
echo "</form>";


if(isset($_POST['submit'])){
    
    $stmt = $conn->prepare("INSERT INTO product (product_name, shoeID, shoe_size, clothesID, clothes_size, brand, colorway, type, gender, product_condition, price, in_stock) 
                            VALUES (:product_name, :shoe_id, :shoe_size, :clothes_id, :clothes_size, :brand_name, :product_color, :product_type, :product_gender, :product_condition, :product_price, :in_stock)");
    
    $stmt->bindValue(':product_name', $_POST['productname']);
    
    if(empty($_POST['shoeid'])){
        $stmt->bindValue(':shoe_id', NULL, PDO::PARAM_STR);
    }
    else{
        $stmt->bindValue(':shoe_id', $_POST['shoeid']);
    }
    
    if($_POST['shoesize'] == -1){
        $stmt->bindValue(':shoe_size', NULL, PDO::PARAM_STR);
    }
    else{
        $stmt->bindValue(':shoe_size', $_POST['shoesize']);
    }
    
    if(empty($_POST['clothesid'])){
        $stmt->bindValue(':clothes_id', NULL, PDO::PARAM_STR);
    }
    else{
        $stmt->bindValue(':clothes_id', $_POST['clothesid']);
    }
    
    if($_POST['clothessize'] == -1){
        $stmt->bindValue(':clothes_size', NULL, PDO::PARAM_STR);
    }
    else{
        $stmt->bindValue(':clothes_size', $_POST['clothessize']);
    }
    
    $stmt->bindValue(':brand_name', $_POST['brand']);
    $stmt->bindValue(':product_color', $_POST['colorway']);
    $stmt->bindValue(':product_type', $_POST['type']);
    
    if($_POST['gender'] == -1){
        $stmt->bindValue(':product_gender', NULL, PDO::PARAM_STR);
    }
    else{
        $stmt->bindValue(':product_gender', $_POST['gender']);
    }
    
    if($_POST['condition'] == -1){
        $stmt->bindValue(':product_condition', NULL, PDO::PARAM_STR);
    }
    else{
        $stmt->bindValue(':product_condition', $_POST['condition']);
    }
    
    $stmt->bindValue(':product_price', $_POST['price']);
    
    if($_POST['instock'] == -1){
        $stmt->bindValue(':in_stock', NULL, PDO::PARAM_STR);
    }
    else{
        $stmt->bindValue(':in_stock', $_POST['instock']);
    }
    
    
    $stmt->execute();
    
    echo "<h4> Data Inserted successfully...!! </h4>";
    
}

echo"</div>";
?>

<html>
<body>
<div align = "center">
	<a href="index.php"> Go Back to Main Page </a>
</div>
</body>
</html>