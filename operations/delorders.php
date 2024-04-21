<?php

if (isset($_POST['delorder'])) {

  $del = $_POST['ordertodel'];
  try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $stmt = $conn->prepare("DELETE FROM orders WHERE order_id=:del");
      $stmt->bindParam(':del', $del);
      $stmt->execute();

      echo "ORDER deleted successfully";
  } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
  }

  // Close the database connection
  $conn = null;
}

?>