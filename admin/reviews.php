<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>

<table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">First</th>
                    <th scope="col">email</th>
                    <th scope="col">review</th>
                    <th scope="col">review_date</th>
                    <th scope="col">status</th>
                    <th scope="col">delete</th>
                  </tr>
                </thead>
                <tbody>



<?php
    include '../app/header.php';

   

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "commarce_php";

    try {

        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        $stmt = $conn->prepare("SELECT * FROM reviews  INNER JOIN users ON reviews.user_id = users.user_id  ");
    
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
          
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            
                ?>
                  <tr>
                    <td><?php echo $row['title'] ?></td>
                    <td><?php echo $row['email'] ?></td> 
                    <td><?php echo $row['review'] ?></td> 
                    <td><?php echo $row['review_date'] ?></td> 
                    <td><?php echo $row['status'] ?></td> 
                    <td>
                      <form action="" method="post">
                     <input type="hidden" name="idtoverify" value="<?php echo $row['review_id'] ;?>">
                     <input type="submit" value="verify" class="btn btn-secondary" name="verify">
                      </form>
                    </td>
                  </tr>


                 
              <?php
            }  
    }
    
  }catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    $conn = null;


?>    


</tbody>
</table>


<?php     include '../app/footer.php'; ?>


<?php

if(isset($_POST['verify'])){

$id=$_POST['idtoverify'];

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // Insert into table
  $sql = "UPDATE reviews set status='verified' where review_id= '$id';";
  // Use exec() because no results are returned
  $conn->exec($sql);
  echo "New record created successfully";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
}
?>


</body>
</html>