<html>
<head>

</head>
<body>
<h3> Add a Product </h3><br />
<form method="post" action='add_products.php'>
<table style='border: solid 1px black;'>
<tbody>
    	<tr><td>Product Name</td>
	<td><input type='text' name='productname' size='15'></td></tr>
    	<tr><td>Shoe ID</td>
	<td><input type='text' name='shoeid' size='15'></td></tr>
    	<tr><td>Clothes ID</td>
    	<td><input type='text' name='clothesid' size='15'></td></tr>
    	<tr><td>Brand</td>
    	<td><input type='text' name='brand' size='15'></td></tr>
    	<tr><td>Condition</td>
	<td><select name='condition'>
		<option value='default' selected>Select Condition</option>
  		<option value='new'>New</option>
  		<option value='used'>Used</option>
	</select></td></tr>
	<tr><td>Price</td>
    	<td><input type='text' name='price' size='10'></td></tr>
	<tr><td>Color</td>
    	<td><input type='text' name='colorway' size='10'></td></tr>
	<tr><td>Type</td>
    	<td><input type='text' name='type' size='15'></td></tr>
	<tr><td>Gender</td>
    	<td><select name='gender'>
		<option value='default' selected>Select Gender</option>
  		<option value='male'>Male</option>
  		<option value='female'>Female</option>
  		<option value='unisex'>Unisex</option>
  		<option value='kids'>Kids</option>
	</select></td></tr>
	<tr><td> <br /> </td></tr>
    	<tr><td><input type='submit' name='submit' value='Submit'></td></tr>
</tbody>
</table>
</form>

<?php
require_once 'connection.php';

if(isset($_POST['submit'])){
    $product_name = $_POST['productname'];
    $shoe_id = $_POST['shoeid'];
    $clothes_id = $_POST['clothesid'];
    $brand_name = $_POST['brand'];
    $product_condition = $_POST['condition'];
    $product_price = $_POST['price'];
    $product_color = $_POST['colorway'];
    $product_type = $_POST['type'];
    $product_gender = $_POST['gender'];
    
    if($clothes_id == ' '){
        $query = mysql_query("INSERT INTO product (product_name, shoeID, clothesID, brand, product_condition, price, colorway, type, gender) VALUES ('$product_name','$shoe_id', NULL, '$brand_name', '$product_condition', '$product_price', '$product_color', '$product_type', '$product_gender')");
        echo "<br /><br /><span> Data Inserted successfully...!! </span>";
    }
    elseif($shoe_id == ' '){
        $query = mysql_query("INSERT INTO product (product_name, shoeID, clothesID, brand, product_condition, price, colorway, type, gender) VALUES ('$product_name', NULL, '$clothes_id', '$brand_name', '$product_condition', '$product_price', '$product_color', '$product_type', '$product_gender')");
        echo "<br /><br /><span> Data Inserted successfully...!! </span>";
    }
}
?>

</body>
</html>