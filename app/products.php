<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

<?php
   
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "commarce_php";

    try {

        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("SELECT * FROM products ");
    
        $stmt->execute();


        if ($stmt->rowCount() > 0) {
          
     echo  " <div class='row row-cols-1 row-cols-md-3 g-4'>" ;
          
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            
                ?>

  <div class="col">
    <div class="card w-100 ">
      <img src="../imgs/<?php echo $row['image'] ?>" class="card-img-top w-30 " >
      <div class="card-body">
        <h5 class="card-title"><?php echo $row['product_name'] ?></h5>
        <p class="card-text"> <?php echo $row['price']  ?></p>
       <form action="" method="post">
        <input type="hidden" name="protodel" value="<?php echo $row['product_name']  ?>">
        <input type="submit" value="delete" name="delpro">
       </form>
      </div>
    </div>
  </div>


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




/* delete */
if (isset($_POST['delpro'])) {
  $del = $_POST['protodel'];
  try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $stmt = $conn->prepare("DELETE FROM products WHERE product_name=:del");
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

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>