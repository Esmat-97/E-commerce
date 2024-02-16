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



echo empty($_POST['title']) ? "title is required<br>" : (preg_match('/[a-zA-Z]/', $_POST['title']) ? "title is valid<br>" : "title is not valid<br>");
echo empty($_POST['lname']) ? "lname is required<br>" : (preg_match('/[a-zA-Z]/', $_POST['lname']) ? "lname is valid<br>" : "lname is not valid<br>");
echo empty($_POST['email']) ? "email is required<br>" : (preg_match('/[\w{10,}@.com]/', $_POST['email']) ? "email is valid<br>" : "fname is not valid<br>");
echo empty($_POST['address']) ? "address is required<br>" : (preg_match('/[a-zA-Z]/', $_POST['address']) ? "address is valid<br>" : "address is not valid<br>");
echo empty($_POST['pass']) ? "password is required<br>" : 
    (!preg_match("/[a-z]/",$_POST['pass']) ? "password must have lower<br>" : "password valid lower<br>") .
    (!preg_match("/[A-Z]/",$_POST['pass']) ? "password must have upper<br>" : "password valid upper<br>") .
    (!preg_match("/[0-9]/",$_POST['pass']) ? "password must have numbers<br>" : "password valid number<br>") .
    (!preg_match("/[!@#$%^&*()-_=+{};:,<.>]/",$_POST['pass']) ? "password must have special characters<br>" : "password valid special characters<br>");





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

 $final = mysqli_query($con," INSERT INTO  users ( title,lname,email,`address`, `password` ) values ('$title','$last','$mail','$add','$pass') ");


 if (!$final) {
    echo "No inserted data";
}
else{
    echo "data inserted successfully "."<br>";
}

                                              



}

?>

