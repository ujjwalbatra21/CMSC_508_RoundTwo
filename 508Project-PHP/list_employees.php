<?php

require_once 'connection.php';

$stmt = $conn->prepare("SELECT empID, emp_firstname, emp_lastname FROM employee");
$stmt->execute();


if($stmt->rowCount() > 0){
    echo "<table>";
    echo "<table style='border: solid 1px black;'>";
    echo "<tr>";
    echo "<tr><th>ID</th><th>First Name</th><th>Last Name</th></tr>";
    echo "</tr>";
    
    echo "<tbody>";
    
    while($row = $stmt->fetch()){
        echo "<tr>";
        echo "<td>" . $row['empID'] . "</td>";
        echo "<td>" . $row['emp_firstname'] . "</td>";
        echo "<td>" . $row['emp_lastname'] . "</td>";
        echo "</tr>";
    }
    
    echo "</tbody>";
    echo "</table>";
}

?>