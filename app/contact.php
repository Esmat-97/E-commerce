<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
</head>
<body>


<?php

$commer1=$_COOKIE['userid'];


?>
<form class="row g-3" action="" method="post">


<div class="col-12">
    <input type="hidden" class="form-control"   name="user_id" value="<?php echo $commer1; ?>">
  </div>


  <div class="col-12">
    <label for="inputAddress" class="form-label">message</label>
    <input type="text" class="form-control"   name="message">
  </div>

 

  <div class="col-12">
    <button type="submit" class="btn btn-primary" name="addmsg">Sign in</button>
  </div>


</form>
</body>
</html>


<?php

if(isset($_POST['addmsg'])){

  
  $user_id=$_POST['user_id'];
    $msg=$_POST['message'];
    $msg_date = date("Y-m-d H:i:s");

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "commarce_php"; 

    try {

        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // Set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Insert into table
        $sql = "INSERT INTO messages (user_id ,message_date, message) VALUES ('$user_id','$msg_date','$msg')";
        // Use exec() because no results are returned
        $conn->exec($sql);
        echo "New record created successfully";
    } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
    
    $conn = null;
}




?>