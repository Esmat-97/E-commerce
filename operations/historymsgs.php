
<table class="table table-striped">

<h1>msgs history</h1>
                <thead>
                  <tr>
                    <th scope="col">date</th>
                    <th scope="col">msgs</th>
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
    
        $stmt = $conn->prepare("SELECT * FROM messages where user_id='$current4';");
    
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
          
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            
                ?>
                  <tr>
                    <td><?php echo $row['message_date'] ?></td>
                    <td><?php echo $row['message'] ?></td>
               <td>
        <form action="" method="post">
        <input type="hidden" name="msgtodel" value="<?php echo $row['message']  ?>">
        <input type="submit" value="delete" name="delmsg">
       </form>
               </td>
                  </tr>

                  <?php include '../operations/delmsgs.php'; ?>

              <?php
            }  
    }
    
  }catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    $conn = null;

?>    