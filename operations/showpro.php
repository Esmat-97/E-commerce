

<?php

$comming=$_COOKIE['userid'];

    
   if(isset($_POST['showpro'])){

    $pro=$_POST['protoshow'];


    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "commarce_php";

    try {

        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        $stmt = $conn->prepare("SELECT * FROM products WHERE product_name =:pro ");
    
        $stmt->bindParam(':pro', $pro);

        $stmt->execute();

        if ($stmt->rowCount() > 0) {
          
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            
                ?>

<div class="card mb-3" >
  <div class="row g-0">

    <div class="col-md-4">
      <img src="../imgs/<?php echo $row['image']; ?>" class="img-fluid rounded-start" style="width:300px">
    </div>

    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"> <?php echo $row['product_name']; ?></h5>
        <p class="card-text"> price : <?php echo $row['price']; ?></p>
        <p class="card-text">available numbers :<?php echo $row['stock']; ?> </p>

      </div>
    </div>

  </div>
</div>



<?php
    
}

} 

else {
echo "Empty rows";
}



} catch(PDOException $e) {
echo "Error: " . $e->getMessage();
}

}
// Close the database connection
$conn = null;

?>

</body>




</html>