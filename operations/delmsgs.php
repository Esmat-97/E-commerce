<?php

if (isset($_POST['delmsg'])) {

  $del = $_POST['msgtodel'];
  try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $stmt = $conn->prepare("DELETE FROM messages WHERE message=:del");
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