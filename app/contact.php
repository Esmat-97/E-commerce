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

$commer1=$_COOKIE['usertitle'];
$commer2=$_COOKIE['useremail'];

?>
<form class="row g-3" action="" method="post">


<div class="col-md-6">
    <label for="inputPassword4" class="form-label">title</label>
    <input type="text" class="form-control"  name="title" value="<?php echo $commer1 ;?>">
  </div>

  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Email</label>
    <input type="email" class="form-control" name="email" value="<?php echo $commer2 ;?>">
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

    $title=$_POST['title'];
    $mail=$_POST['email'];
    $msg=$_POST['message'];



    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "commarce_php"; 

    try {

        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // Set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Insert into table
        $sql = "INSERT INTO messages (title, email, message) VALUES ('$title', '$mail','$msg')";
        // Use exec() because no results are returned
        $conn->exec($sql);
        echo "New record created successfully";
    } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
    
    $conn = null;
}




?>