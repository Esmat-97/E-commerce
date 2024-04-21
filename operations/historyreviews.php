

<table class="table table-striped">
<h1>reviews history</h1>
                <thead>
                  <tr>
                    <th scope="col">date</th>
                    <th scope="col">review</th>
                    <th scope="col">status</th>
                    <th scope="col">delete</th>
                  </tr>
                </thead>
                <tbody>



<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "commarce_php";

    try {

        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        $stmt = $conn->prepare("SELECT * FROM reviews where user_id='$current4';");
    
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
          
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            
                ?>
                  <tr>
                    <td><?php echo $row['review_date'] ?></td>
                    <td><?php echo $row['review'] ?></td>
                    <td><?php echo $row['status'] ?></td>
               <td>
               <form action="" method="post">
        <input type="hidden" name="reviewtodel" value="<?php echo $row['review_id'] ; ?>">
        <input type="submit" value="delete" class="btn btn-danger" name="delreview">
       </form>
               </td>
                  </tr>

                  <?php include '../operations/delreviews.php'; ?>
              <?php
            }  
    }
    
  }catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    $conn = null;

?>    