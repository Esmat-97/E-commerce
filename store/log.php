<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="styles.css">
<title>Login Page</title>
<style>
    @import url(https://fonts.googleapis.com/css?family=Roboto:300);
header .header{
  background-color: #fff;
  height: 45px;
}
header a img{
  width: 134px;
margin-top: 4px;
}
.login-page {
  width: 360px;
  padding: 8% 0 0;
  margin: auto;
}
.login-page .form .login{
  margin-top: -31px;
margin-bottom: 26px;
}
.form {
  position: relative;
  z-index: 1;
  background: #FFFFFF;
  max-width: 360px;
  margin: 0 auto 100px;
  padding: 45px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
.form input {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}
.form button {
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background-color: #328f8a;
  background-image: linear-gradient(45deg,#328f8a,#08ac4b);
  width: 100%;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}
.form .message {
  margin: 15px 0 0;
  color: #b3b3b3;
  font-size: 12px;
}
.form .message a {
  color: #4CAF50;
  text-decoration: none;
}

.container {
  position: relative;
  z-index: 1;
  max-width: 300px;
  margin: 0 auto;
}

body {
  background-color: #328f8a;
  background-image: linear-gradient(45deg,#328f8a,#08ac4b);
  font-family: "Roboto", sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}
</style>
</head>
<body>
<div class="login-page">
  <div class="form">

    <div class="login">
      <div class="login-header">
        <h3>LOGIN</h3>
        <p>Please enter your credentials to login.</p>
      </div>
    </div>


    <form class="login-form" method="post">
      <input type="text" name="title" placeholder="username"/>
      <input type="password" name="pass" placeholder="password"/>
      <button type="submit" name="submit">login</button>
      <p class="message">Not registered? <a href="sign.php">Create an account</a></p>
    </form>
  </div>
</div>
</body>
</html>
<?php
if(isset($_POST['submit'])){

$title=$_POST['title'];
$pass=$_POST['pass'];

echo empty($_POST['title']) ? "title is required<br>" : (preg_match('/[a-zA-Z]/', $_POST['title']) ? "title is valid<br>" : "title is not valid<br>");
echo empty($_POST['pass']) ? "password is required<br>" : 
    (!preg_match("/[a-z]/",$_POST['pass']) ? "password must have lower<br>" : "password valid lower<br>") .
    (!preg_match("/[A-Z]/",$_POST['pass']) ? "password must have upper<br>" : "password valid upper<br>") .
    (!preg_match("/[0-9]/",$_POST['pass']) ? "password must have numbers<br>" : "password valid number<br>") .
    (!preg_match("/[!@#$%^&*()-_=+{};:,<.>]/",$_POST['pass']) ? "password must have special characters<br>" : "password valid special characters<br>");



/* connect to database   */


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
 
 




          /*   get data from database     */
 

 $final = mysqli_query($con," SELECT * FROM users WHERE title='$title' AND  password='$pass' ");

 if (!$final) {
    echo "fail coonection";
}
else{
    echo "get data from sql "."<br>";
}


if(mysqli_num_rows($final) > 0){

    $iti=mysqli_fetch_array($final);
    
    setcookie("usertitle",$iti['title'],time() + 60*60);
    
    header("location: base.php");
     }else{
        echo "fail coonection";
    }


}




?>