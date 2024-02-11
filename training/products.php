


<?php


/*  connected to coookie      */



$host = "localhost";
 $username = "root";
 $password = "";
 $dbname = "cookie";
 $conn = mysqli_connect($host, $username, $password, $dbname);
 
 if (!$conn) {
     echo "fail coonection";
 }
 else{
     echo "connected to data successfully"."<br>";
 }
 

 
   /*   connect to cookie                 */



$user_tit=$_COOKIE['usertitle'];


$final = mysqli_query($conn," SELECT * FROM users WHERE title='$user_tit' ");

if (!$final) {
   echo "fail to cookie";
}
else{
   echo "connected to coookie "."<br>";
}

$finish=mysqli_fetch_array($final);

     $give=$finish['title'];

?>

<a href="logout.php">logout</a>
<h1> <?php echo "welcome". $give."<br>" ?></h1>
 








<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>
    <body>

 
    <?php 


    /*   admin page */
    
    if($give == "mohamed"){

echo " <h1>the admin page</h1>"; 
            
$all_users = mysqli_query($conn," SELECT * FROM users ");   ?>
 
 
 <?php
while($row = mysqli_fetch_assoc($all_users)) { 
   
  ?>



<div class="row row-cols-3 row-cols-md-3  row-cols-lg-4 g-4">
<div class="col">
<div class="card h-100">
<div class="card-body">
  <div class="card-text"> name :<?php echo $row["title"]; ?> </div>
</div>
</div>
</div>
</div>

  <?php
}
}
  ?>
              








<?php


/*  show products */


$result = mysqli_query($conn, "SELECT * FROM products;");
      while($row = mysqli_fetch_assoc($result)) { 
         
        ?>



 <div class="row row-cols-3 row-cols-md-3  row-cols-lg-4 g-4">
  <div class="col">
    <div class="card h-100">

    
      <div class="card-body">
      <img src="<?php echo $row["image"]; ?> " class="w-50">
        <h5 class="card-title"> id:<?php echo $row["id"];?>  </h5>
        <div class="card-text"> name :<?php echo $row["name"]; ?> </div>
        <div class="card-text"> price :<?php echo $row["price"]; ?>  </div>
        <div class="card-text"> des :<?php echo $row["description"]; ?>  </div>
        <div class="card-text"> category :<?php echo $row["category"]; ?>  </div>
        <div class="card-text"> stock :<?php echo $row["stock"]; ?>  </div>
        <div class="card-text">  <?php if($give == "mohamed"){
                        echo " <button>delete</button> <button>addtoCart</button>";} ?> </div>
      </div>


    </div>
  </div>
  </div>

        <?php
      }
        ?> 
    </body>
    </html>