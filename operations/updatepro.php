<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
</head>
<body>

<?php

if (isset($_POST['submit'])) {

  $price = $_POST['updateprice'];
  $id = $_POST['product_id'];

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "commarce_php";

  try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $stmt = $conn->prepare("UPDATE products set price=:pri WHERE  product_id=:id");
      $stmt->bindParam(':pri', $price);
      $stmt->bindParam(':id', $id);
      $stmt->execute();

      echo "Product deleted successfully";
  } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
  }

  // Close the database connection
  $conn = null;
}

?>




<?php

$comer=$_COOKIE['userrole'];

   
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "commarce_php";

    if(isset($_POST['uppro'])){

$data=$_POST['protoup'];

    try {

        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("SELECT * FROM products where product_name='$data'; ");
    
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
          
   
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            
                ?>

<form action="" method="post">
<input type="hidden" name="product_id"  value="<?php echo $row['product_id']; ?>">
<input type="text" name="updateprice"   value="<?php echo $row['price']; ?>">
<input type="submit" value="submit" name="submit">

</form>

 
<?php
    
}
echo "</div>";
} else {
echo "Empty rows";
}
} catch(PDOException $e) {
echo "Error: " . $e->getMessage();
}

// Close the database connection
$conn = null;

    }
?>


</body>




</html>