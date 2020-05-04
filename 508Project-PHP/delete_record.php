<?php

require_once 'connection.php';

echo "<div align = 'center'>";
echo "<h3> Purchase a Product. </h3><br />";

echo "<form method='post' action='delete_record.php'>";

echo "<h4> Please select what record you want to delete:</h4> <br />";

echo "<input type='radio' name='product' value='Product' onclick='location.href=list_products.php'>";
echo "<label> Product </label>";

echo "<input type='radio' name='transaction' value='Transaction'>";
echo "<label> Transaction </label>";

echo "<a href='list_employees.php'> <input type='radio' name='employee' value='Employee'> </a>";
echo "<label> Employee </label><br>";

echo "<input type='submit' name='submit' value='SELECT'></td></tr>";

echo "</form>";
echo "</div>";


/*if(isset($_POST['submit'])){
    if(isset($_POST['product']))
    {
        echo "<form method='post' action='add_transaction.php'>";
        echo "<table>";
        echo "<tbody>";
        echo "<tr><td>Select Product Name: </td>";
        $stmt = $conn->prepare("SELECT productID, product_name, in_stock FROM product");
        $stmt->execute();
        echo "<td><select name='product'>";
        echo "<option value='-1'>No Product</option>";
        while($row = $stmt->fetch()){
            echo "<option value='$row[productID]'>$row[product_name] $row[in_stock]</option>";
        }
        echo "</select></td></tr>";
        echo "<tr><td><input type='submit' name='go_product' value='GO!'></td></tr>";
        echo "</tbody>";
        echo "</table>";
        echo "</form>";
        
        if(isset($_POST['go_product'])){
            $product = $_POST['product'];
            if($product != -1){
                $stmt = $conn->prepare("DELETE FROM product WHERE productID=$product");
                $stmt->execute();
            }
            else{
                echo "<h5 style='color:red;'>No product selected</h5>";
            }
        }
    }
    
    if(isset($_POST['transaction']))
    {
        echo "You have selected :".$_POST['transaction'];
    }
    
    if(isset($_POST['employee']))
    {
        echo "You have selected :".$_POST['employee'];
    }
}*/
?>