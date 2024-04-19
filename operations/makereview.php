

<?php

if(isset($_POST['review'])){

      $user = $_POST['user_id'];
      $review=$_POST['addreview'];
      $review_date = date("Y-m-d H:i:s");

    try {
      
  $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "commarce_php";

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 $stmt = $conn->prepare("INSERT INTO reviews (user_id, review_date ,review) VALUES (:user, :product, :review_date)");

        // Bind parameters
        $stmt->bindParam(':user', $user);
        $stmt->bindParam(':product', $review_date);
        $stmt->bindParam(':review_date', $review);

        // Execute the statement
        $stmt->execute();

    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage(); // Display more informative error message
    }
}
?>


