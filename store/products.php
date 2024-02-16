
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <style>
          #one{
            width: 250px;
          }
        </style>
    </head>
    <body>


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
 

 
   /*   connect to token    */

$user_tit=$_COOKIE['usertitle'];


?>

<h1> <?php echo "welcome". $user_tit."<br>" ?></h1>
 
    <div class="row row-cols-1 row-cols-md-3  row-cols-lg-4 g-4">

<?php

/*  show products */

$result = mysqli_query($conn, "SELECT * FROM products;");
      while($row = mysqli_fetch_assoc($result)) { 
        
        ?>
       <div class="col">
        <div class="card h-100">
      <div class="card-body">


      <img src="<?php echo $row["image"]; ?> " id="one">
        <div class="card-text"> name :<?php echo $row["name"]; ?> </div>
        <div class="card-text"> price :<?php echo $row["price"]; ?>  </div>
            <?php if($user_tit == "mohamed"){
              ?>
               
               <form  method="post">
                <p><input type="hidden" name="havename" value="<?php echo $row["name"] ?>"></p>
                <p><input type="submit" name="del" value="delete" class="btn btn-danger"></p>
               </form>

              <?php
               } 
               ?> 
              
              <form  method="post">
                <p><input type="hidden"  name="havename" value="<?php echo $row["name"] ?>"></p>
                <p><input type="submit" name="add" value="addToCart" class="btn btn-warning"></p>
               </form>


               <form  action="more.php" method="post" >
                <p><input type="hidden"  name="havename"  value="<?php echo $row["name"] ?>"></p>
                <p><input type="submit" name="more" value="more" class="btn btn-secondary"></p>
               </form>




    </div>
  </div>
  </div>

        <?php
      }
        ?> 


</div>



               
              

 
    </body>
    </html>



