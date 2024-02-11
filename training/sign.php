<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
<p> title<input type="text" name="title"  ></p>
<p> lname<input type="text" name="lname" ></p>
<p>email<input type="text" name="email" ></p>
<p> address<textarea   cols="20" rows="10"  name="address" ></textarea></p>
<p>pass<input type="password" name="pass" ></p>
<input type="submit"  value="submit"  name="submit">
    </form>
</body>
</html>




<?php
if(isset($_POST['submit'])){

$title=$_POST['title'];
$last=$_POST['lname'];
$mail=$_POST['email'];
$add=$_POST['address'];
$pass=$_POST['pass'];



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


 $final = mysqli_query($con," INSERT INTO  users ( title,lname,email,`address`, `password` ) values ('$title','$last','$mail','$add','$pass') ");


 if (!$final) {
    echo "No inserted data";
}
else{
    echo "data inserted successfully "."<br>";
}

                                              
}




?>
