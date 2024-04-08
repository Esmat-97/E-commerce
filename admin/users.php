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
                    <th scope="col">Last</th>
                    <th scope="col">email</th>
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


        
        // Use prepared statement to prevent SQL injection
        $stmt = $conn->prepare("SELECT * FROM users ");
    
        $stmt->execute();

        // Check if any rows were returned
        if ($stmt->rowCount() > 0) {
          
          
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            
                ?>
               
                  <tr>
                 
                    <td><?php echo $row['title'] ?></td>
                    <td><?php echo $row['lname'] ?></td>
                    <td><?php echo $row['email'] ?></td>
                  </tr>
                 
             

              <?php
    
            }
            echo "</ul>";
        } else {
            echo "Invalid credentials";
        }
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    
    // Close the database connection
    $conn = null;


?>

</tbody>
</table>



<?php     include '../app/footer.php'; ?>


</body>
</html>