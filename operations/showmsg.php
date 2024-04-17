<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
</head>
<body>

<?php


    
   if(isset($_POST['showmsg'])){

    $pro=$_POST['msgtoshow'];


    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "commarce_php";

    try {

        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        $stmt = $conn->prepare("SELECT * FROM messages WHERE  message=:pro ");
    
        $stmt->bindParam(':pro', $pro);

        $stmt->execute();

        if ($stmt->rowCount() > 0) {
          
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            
                ?>

<div class="card mb-3" >
  <div class="row g-0">

    <div class="col-md-4">
      <img src="../imgs/msg.png" class="img-fluid rounded-start" style="width:600px">
    </div>

    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"> <?php echo $row['title']; ?></h5>
        <p class="card-text"> Email: <?php echo $row['email']; ?></p>
        <p class="card-text"> the msg :<?php echo $row['message']; ?> </p>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>



</html>