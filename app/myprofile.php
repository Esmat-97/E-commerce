<!DOCTYPE html>
<html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<head>
    <title>My Profile Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

      #main  img{
            width: 150px;
            height: 150px;
        }
     
        #main {
            margin: 15px;
        }
        #main h2 {
            margin-top: 0;
        }
        #main p {
            margin-bottom: 10px;
        }
        
    </style>
</head>
<body>

<?php include 'header.php'; ?>

 
    <div id="main">
        <h2>About Me</h2>
        <img src="user.png" alt="" srcset="">
        <p>This is a paragraph about me.</p>

<?php
        $current1=$_COOKIE['usertitle'];
        $current2=$_COOKIE['useremail'];
        $current3=$_COOKIE['userrole'];
       
 ?>
        <form>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">first name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" disabled aria-describedby="emailHelp" value="<?php echo $current1 ; ?>">
  
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">email</label>
    <input type="text" class="form-control" id="exampleInputPassword1"  disabled value="<?php echo $current2 ; ?>">
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">role </label>
    <input type="text" class="form-control" id="exampleInputPassword1"  disabled value="<?php echo $current3; ?>">
  </div>


 
</form>
        
    </div>
  
</body>
</html>

<?php include 'footer.php'; ?>