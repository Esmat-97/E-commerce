<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</head>
<body>
    
<?php

include '../app/header.php';

   
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "commarce_php";

    try {

        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("SELECT * FROM messages 
        INNER JOIN users ON messages.user_id = users.user_id;
        ");
    
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
          
     echo  " <div class='row row-cols-1 row-cols-md-3 g-4'>" ;
          
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            
                ?>

  <div class="col">
    <div class="card w-100">
      <div class="card-body">
        <p class="card-text"> <?php echo $row['message']  ?></p>
        <p class="card-text"> <?php echo $row['message_date']  ?></p>
     
       <form action="../operations/showmsg.php" method="post">
        <input type="hidden" name="msgtoshow" value="<?php echo $row['message']  ?>">
        <input type="submit" value="show more" name="showmsg">
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



?>


<?php

include '../app/footer.php';


?>
</body>
</html>