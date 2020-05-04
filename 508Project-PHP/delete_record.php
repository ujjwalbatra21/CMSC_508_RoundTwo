<?php

require_once 'connection.php';

echo "<div align = 'center'>";
echo "<h3> Purchase a Product. </h3><br />";

echo "<form method='post' action='delete_record.php'>";

echo "<h5> Please select what record you want to delete:</h5> <br />";
echo "<label> Product </label><br>";
echo "<input type='radio' name='product' value='Product'>";
echo "<label> Transaction </label><br>";
echo "<input type='radio' name='transaction' value='Transaction'>";
echo "<label> Employee </label><br>";
echo "<input type='radio' name='employee' value='Employee'>";

echo "<input type='submit' name='submit' value='SELECT'></td></tr>";

echo "</form>";
echo "</div>";


if(isset($_POST['submit'])){
    if(isset($_POST['product']))
    {
        echo "You have selected :".$_POST['product'];
    }
    
    if(isset($_POST['transaction']))
    {
        echo "You have selected :".$_POST['transaction'];
    }
    
    if(isset($_POST['employee']))
    {
        echo "You have selected :".$_POST['employee'];
    }
}
?>