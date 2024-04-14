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

<?php

$id=$_COOKIE['userid'];

?>

<body>
    <form action="" method="post">
<p> name<input type="text" name="product_name"  ></p>
<p> price<input type="text" name="price" ></p>
<p>stock<input type="text" name="stock" ></p>
<p> image <input type="file" name="uploadfile"></p>
<p>admin <input type="text" name="user_id" value="<?php echo $id; ?>" ></p>
<input type="submit"  value="submit"  name="submit">
    </form>
</body>
</html>



<?php

if(isset($_POST['submit'])){

    $product_name = $_POST['product_name'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $image = $_POST['uploadfile'];
    $user_id = $_POST['user_id'];


    echo $image ;

    // Connect to the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "commarce_php";

    
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // Set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Insert into table
        $sql = "INSERT INTO products (product_name, price, stock, image , user_id) VALUES ('$product_name', '$price', '$stock' ,'$image', $user_id)";
        // Use exec() because no results are returned
        $conn->exec($sql);
        echo "New record created successfully";
    } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }

    $conn = null;

}

?>


