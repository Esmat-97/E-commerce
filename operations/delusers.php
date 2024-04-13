<?php

if (isset($_POST['deluser'])) {
  $del = $_POST['usertodel'];
  try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $stmt = $conn->prepare("DELETE FROM users WHERE email=:del");
      $stmt->bindParam(':del', $del);
      $stmt->execute();

      echo "Product deleted successfully";
  } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
  }

  // Close the database connection
  $conn = null;
}

?>