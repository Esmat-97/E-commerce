
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../css/dashboard.css">
    <title>Simple Dashboard</title>

</style>
</head>
<body>
    <div class="dashboard">
        <div class="sidebar">
            <div class="sidebar-item">
                <a href="#">Link 1</a>
            </div>
            <div class="sidebar-item">
                <a href="#">Link 2</a>
            </div>
            <div class="sidebar-item">
                <a href="#">Link 3</a>
            </div>
        </div>
        <div class="content">
            <h1>Welcome to the Dashboard</h1>
            <p>This is a simple dashboard with a sidebar and content area.</p>
            <div class="counters">



<?php
   
   
   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "commarce_php";

   try {

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

       $stmt = $conn->prepare(" SELECT COUNT(product_name) FROM products;");
   
       $stmt->execute();

       if ($stmt->rowCount() > 0) {
         
           while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
           
              ?>

               <div class="counter">
                    <h2>products:</h2>
                    <p><?php echo $row['COUNT(product_name)'] ?> </p>
                </div>

                
                <?php
   
                }

} else {
echo "Empty rows";
}
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    }
    
// Close the database connection
$conn = null;




/* USERS  */


   try {

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

       $stmt = $conn->prepare(" SELECT COUNT(email) FROM users;");
   
       $stmt->execute();

       if ($stmt->rowCount() > 0) {
         
           while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
           
              ?>

               <div class="counter" style="background-color:red;">
                    <h2>Users:</h2>
                    <p><?php echo $row['COUNT(email)'] ?> </p>
                </div>

                
                <?php
   
                }

} else {
echo "Empty rows";
}
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    }
    
// Close the database connection
$conn = null;






/* admin */

try {

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

       $stmt = $conn->prepare(" SELECT COUNT(email) FROM users WHERE role='admin';");
   
       $stmt->execute();

       if ($stmt->rowCount() > 0) {
         
           while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
           
              ?>

               <div class="counter" style="background-color:red;">
                    <h2>Admin:</h2>
                    <p><?php echo $row['COUNT(email)'] ?> </p>
                </div>

                
                <?php
   
                }

} else {
echo "Empty rows";
}
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    }
    
// Close the database connection
$conn = null;






/* customers */

try {

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

       $stmt = $conn->prepare(" SELECT COUNT(email) FROM users WHERE role='customer';");
   
       $stmt->execute();

       if ($stmt->rowCount() > 0) {
         
           while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
           
              ?>

               <div class="counter" style="background-color:red;">
                    <h2>Customers:</h2>
                    <p><?php echo $row['COUNT(email)'] ?> </p>
                </div>

                
                <?php
   
                }

} else {
echo "Empty rows";
}
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    }
    
// Close the database connection
$conn = null;




try {

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

       $stmt = $conn->prepare(" SELECT COUNT(message) FROM messages ");
   
       $stmt->execute();

       if ($stmt->rowCount() > 0) {
         
           while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
           
              ?>

               <div class="counter">
                    <h2>messages:</h2>
                    <p><?php echo $row['COUNT(message)'] ?> </p>
                </div>

                
                <?php
   
                }

} else {
echo "Empty rows";
}
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    }
    
// Close the database connection
$conn = null;




try {

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

       $stmt = $conn->prepare(" SELECT COUNT(order_date) FROM  orders where status='pending' ");
   
       $stmt->execute();

       if ($stmt->rowCount() > 0) {
         
           while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
           
              ?>

               <div class="counter" style="background-color:blue; color:white;">
                    <h2>pending orders:</h2>
                    <p><?php echo $row['COUNT(order_date)'] ?> </p>
                </div>

                
                <?php
   
                }

} else {
echo "Empty rows";
}
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    }
    
// Close the database connection
$conn = null;





try {

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

       $stmt = $conn->prepare(" SELECT COUNT(order_date) FROM  orders where status='accepted'; ");
   
       $stmt->execute();

       if ($stmt->rowCount() > 0) {
         
           while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
           
              ?>

               <div class="counter" style="background-color:blue; color:white;">
                    <h2>accepted orders:</h2>
                    <p><?php echo $row['COUNT(order_date)'] ?> </p>
                </div>

                
                <?php
   
                }

} else {
echo "Empty rows";
}
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    }
    
// Close the database connection
$conn = null;
?>


               
            </div>
        </div>
    </div>
</body>
</html>

</body>
</html>