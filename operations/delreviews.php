<?php

if (isset($_POST['delreview'])) {

  $del = $_POST['reviewtodel'];
  try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $stmt = $conn->prepare("DELETE FROM reviews WHERE review_id=:del");
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