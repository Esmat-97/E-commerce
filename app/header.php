
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>



<nav class="navbar navbar-expand-lg bg-danger text-white">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">


        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../app/main.php">Home</a>
        </li>


        <?php
      $comming =$_COOKIE['userrole'];
      ?>


<?php

if( ! $comming){


?>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="log.php">login</a>
        </li>


  <?php

}
?>
      


         <?php

      if($comming === "admin"){

      
      ?>
    <div class="dropdown">
        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
   admin list
  </a>

  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="../admin/users.php">users</a></li>
    <li><a class="dropdown-item" href="../admin/addusers.php">addusers</a></li>
    <li><a class="dropdown-item" href="../admin/addproducts.php">addproducts</a></li>
    <li><a class="dropdown-item" href="../admin/dashboard.php">dashboard</a></li>
  </ul>
</div>


        <?php
      }
      ?>


      
      </ul>
     
    </div>
    
<!-- rigth side -->
  
    <div class="btn-group dropstart">
  <a type="button" class= "dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
    <img class="rounded-circle" src="image.jpg" width="35" />
    </a>
  <ul class="dropdown-menu">
    <?php
        $comming =$_COOKIE['userrole'];
  if($comming ){
    ?>
    <li><a class="dropdown-item" href="myprofile.php">My profile</a></li>
    <li><a class="dropdown-item" href="logout.php">logout</a></li>
    
    <?php
  }
  ?>
  </ul>
</div>
  </div>
</nav>





<script  src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
