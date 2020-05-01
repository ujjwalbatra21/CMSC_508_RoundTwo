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

$stmt = $conn->prepare("SELECT ID, emp_name FROM employee");
$stmt->execute();


if($stmt->rowCount() > 0){
    echo "<table>";
    echo "<table style='border: solid 1px black;'>";
    echo "<tr>";
    echo "<tr><th>ID</th><th>Employee Name</th></tr>";
    echo "</tr>";
    
    echo "<tbody>";
    
    while($row = $stmt->fetch()){
        echo "<tr>";
        echo "<td>" . $row['ID'] . "</td>";
        echo "<td>" . $row['emp_name'] . "</td>";
        echo "</tr>";
    }
    
    echo "</tbody>";
    echo "</table>";
}

else{
    echo "<h4> No Employees in the database.</h4>";
}

?>

</body>
</html>