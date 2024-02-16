<?php

$host = "localhost";
 $username = "root";
 $password = "";
 $dbname = "cookie";

 $conn = mysqli_connect($host, $username, $password, $dbname);
 
 if (!$conn) {
    echo "fail coonection"; 
    
 }
 else{
  echo "connected to data successfully"."<br>";;
 }    
 





 $user_tit=$_COOKIE['usertitle'];
   
if($user_tit == "mohamed"){
    echo " <h1>the admin page</h1>";
    ?>
     
     <div class="row row-cols-1 row-cols-md-3  row-cols-lg-4 g-4">
    
    
     <?php
    $all_users = mysqli_query($conn," SELECT * FROM users ");  
    
    while($row = mysqli_fetch_assoc($all_users)) { 
       
      ?>
    <div class="col">
    <div class="card h-15">
    <div class="card-body">
      <div class="card-text"> name :<?php echo $row["title"]; ?> </div>
    </div>
    </div>
    </div>
    
      <?php
    }
    }
    
      ?>
        </div>          
    
    
    
