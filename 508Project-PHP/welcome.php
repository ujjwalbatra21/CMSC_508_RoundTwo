<?php
   include('session.php');
?>
<html">
   
   <head>
      <title>Welcome </title>
   </head>
   
   <body>
      <h1>Welcome <?php echo $login_session; ?> </h1> 
      <h3> <a href="add_products.php"> Add a Product </a> </h3>
      <h2> <a href = "logout.php"> Sign Out </a> </h2>
   </body>
   
</html>