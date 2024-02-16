<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
body {
  background-color: #f2f2f2; /* Add a light gray background color */
}

        form {
  width: 300px;
  margin: 0 auto;
  font-family: Arial, sans-serif;
  background-color: #f9f9f9; /* Add a light gray background color */
  padding: 20px;
  border-radius: 5px;
}

input[type="text"],
input[type="password"],
textarea {
  width: 100%;
  padding: 5px;
  box-sizing: border-box;
  border: 1px solid #ccc;
  border-radius: 3px;
  background-color: #ffffff; /* Add a white background color */
}

textarea {
  resize: vertical;
}

input[type="submit"] {
  width: 100%;
  padding: 10px;
  background-color: #4CAF50;
  color: white;
  border: none;
  border-radius: 3px;
  cursor: pointer;
}

input[type="submit"]:hover {
  background-color: #45a049;
}
    </style>
</head>
<body>
    <form action="" method="post">
<p> name<input type="text" name="name"  ></p>
<p> price<input type="text" name="price" ></p>
<p>stock<input type="text" name="stock" ></p>
<p>image<input type="text" name="image" ></p>
<p>category<input type="text" name="category" ></p>
<p> description<textarea   cols="20" rows="10"  name="description" ></textarea></p>
<input type="submit"  value="submit"  name="submit">
    </form>
</body>
</html>




<?php
if(isset($_POST['submit'])){



$a=$_POST['name'];
$b=$_POST['price'];
$c=$_POST['stock'];
$d=$_POST['image'];
$e=$_POST['category'];
$f=$_POST['description'];





/*  connect to database    */


 $host = "localhost";
 $username = "root";
 $password = "";
 $dbname = "cookie";
 $con = mysqli_connect($host, $username, $password, $dbname);
 
 if (!$con) {
    echo "fail coonection";
 }
 else{
     echo "connected to data successfully"."<br>";
 }
 




   /*    insert in  table  */ 

 $final = mysqli_query($con," INSERT INTO  products (  `name`,price,`stock`,`image`, `category`, `description` ) values ('$a','$b','$c','$d','$e','$f') ");


 if (!$final) {
    echo "No inserted data";
}
else{
    echo "data inserted successfully "."<br>";
}

                                              



}

?>

