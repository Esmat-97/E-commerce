<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../css/log.css">
<title>Login Page</title>
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
    $title = $_POST['title'];
    $pass = $_POST['pass'];






    // Connect to the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "commarce_php";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        
        // Use prepared statement to prevent SQL injection
        $stmt = $conn->prepare("SELECT * FROM users WHERE title=:title AND password=:password");
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':password', $pass);
        $stmt->execute();

        // Check if any rows were returned
        if ($stmt->rowCount() > 0) {
            echo "Login successful<br>";

            // Fetch and display the data
            echo "<h2>User Data:</h2>";
            echo "<ul>";
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
               
                 
    setcookie("userid",$row['user_id'],time() + 60*60,'/');
    setcookie("usertitle",$row['title'],time() + 60*60,'/');
    setcookie("useremail",$row['email'],time() + 60*60,'/');
    setcookie("userrole",$row['role'],time() + 60*60,'/');
    
    header("location: main.php");
            }
            echo "</ul>";
        } else {
            echo "Invalid credentials";
        }
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    
    // Close the database connection
    $conn = null;
}
?>
