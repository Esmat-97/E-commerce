

<?php


if(isset($_POST['cart'])){


      // Get form data
      $user = $_POST['user_id'];
      $product = $_POST['product_id'];
      $order_date = date("Y-m-d H:i:s");


    try {
      
  $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "commarce_php";


   
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("INSERT INTO orders (user_id, product_id, order_date) VALUES (:user, :product, :order_date)");

        // Bind parameters
        $stmt->bindParam(':user', $user);
        $stmt->bindParam(':product', $product);
        $stmt->bindParam(':order_date', $order_date);

        // Execute the statement
        $stmt->execute();

    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage(); // Display more informative error message
    }
}
?>


