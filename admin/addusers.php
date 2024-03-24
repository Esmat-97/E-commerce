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
<p>pass<input type="password" name="pass" ></p>
<input type="submit"  value="submit"  name="submit">
    </form>
</body>
</html>





<?php
if(isset($_POST['submit'])){

    $title = $_POST['title'];
    $last = $_POST['lname'];
    $mail = $_POST['email'];
    $pass = $_POST['pass'];

    echo empty($_POST['title']) ? "Title is required<br>" : (preg_match('/[a-zA-Z]/', $_POST['title']) ? "Title is valid<br>" : "Title is not valid<br>");
    echo empty($_POST['lname']) ? "Last name is required<br>" : (preg_match('/[a-zA-Z]/', $_POST['lname']) ? "Last name is valid<br>" : "Last name is not valid<br>");
    echo empty($_POST['email']) ? "Email is required<br>" : (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ? "Email is valid<br>" : "Email is not valid<br>");
    echo empty($_POST['pass']) ? "Password is required<br>" :
        (!preg_match("/[a-z]/", $_POST['pass']) ? "Password must have lowercase<br>" : "Password contains lowercase<br>") .
        (!preg_match("/[A-Z]/", $_POST['pass']) ? "Password must have uppercase<br>" : "Password contains uppercase<br>") .
        (!preg_match("/[0-9]/", $_POST['pass']) ? "Password must have numbers<br>" : "Password contains numbers<br>") .
        (!preg_match("/[!@#$%^&*()-_=+{};:,<.>]/", $_POST['pass']) ? "Password must have special characters<br>" : "Password contains special characters<br>");

    // Connect to the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "commarce_php"; 

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



        // Insert into table
        $sql = "INSERT INTO users (title, lname, email, `password`) VALUES ('$title', '$last', '$mail', '$pass')";
        // Use exec() because no results are returned
        $conn->exec($sql);
        echo "New record created successfully";
    } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
    
    $conn = null;
}
?>




