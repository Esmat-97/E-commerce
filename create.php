<?php

// Array of objects
$data  = array(
    array(
        "id"=>1,
        "name"=>"Hyaluronic Acid Serum",
        "price"=>19,
         "description"=>"L'OrÃ©al Paris introduces Hyaluron Expert Replumping Serum formulated with 1.5% Hyaluronic Acid",
        "image"=>"https://cdn.dummyjson.com/product-images/16/thumbnail.jpg",
       "category"=>"skincare",
        "stock"=>110,
    ),
       
       
    array(
        "id"=>2,
        "name"=>"Tree Oil 30ml",
        "price"=>19,
 "description"=>"Tea tree oil contains a number of compounds, including terpinen-4-ol, that have been shown to kill certain bacteria",
        "image"=>"https://cdn.dummyjson.com/product-images/16/thumbnail.jpg",
       "category"=>"skincare",
        "stock"=>110,
    ),
    array(
        "id"=>3,
        "name"=>"Oil Free Moisturizer 100ml",
        "price"=>19,
 "description"=>"Dermive Oil Free Moisturizer with SPF 20 is specifically formulated with ceramides, hyaluronic acid & sunscreen.",
        "image"=>"https://cdn.dummyjson.com/product-images/16/thumbnail.jpg",
       "category"=>"skincare",
        "stock"=>110,
    ),
    array(
        "id" => 4,
        "name" => "OPPOF19 is officially announced on April 2021.",
        "price" => 76,
        "description" => "OPPOF19",
        "image" => "https://cdn.dummyjson.com/product-images/1/thumbnail.jpg",
        "category" => "Smartphone",
        "stock" => 30
    ),
    array(
        "id" => 5,
        "name" => "Infinix INBOOK",
        "price" => 81,
        "description" => "Infinix Inbook X1 Ci3 10th 8GB 256GB 14 Win10 Grey , 1 Year Warranty",
        "image" => "https://cdn.dummyjson.com/product-images/6/thumbnail.png",
        "category" => "laptops",
        "stock" => 27
    ),
    array(
        "id" => 6,
        "name" => "HP Pavilion 15-DK1056WM",
        "price" => 69,
        "description" => "HP Pavilion 15-DK1056WM Gaming Laptop 10th Gen Core i5, 8GB, 256GB SSD, GTX 1650 4GB, Windows 10.",
        "image" => "https://cdn.dummyjson.com/product-images/7/thumbnail.jpg",
        "category" => "laptops",
        "stock" => 24
    ),
    array(
        "id" => 7,
        "name" => "Elbow Macaroni - 400 gm",
        "price" => 77,
        "description" => "Product details of Bake Parlor Big Elbow Macaroni - 400 gm",
        "image" => "https://cdn.dummyjson.com/product-images/22/thumbnail.jpg",
        "category" => "groceries",
        "stock" => 22
    ),
    array(
        "id" => 8,
        "name" => "Orange Essence Food Flavou",
        "price" => 91,
        "description" => "Specifications of Orange Essence Food Flavour For Cakes and Baking Food Item",
        "image" => "https://cdn.dummyjson.com/product-images/23/thumbnail.jpg",
        "category" => "groceries",
        "stock" => 14
    ),
    array(
        "id" => 9,
        "name" => "Plant Hanger For Home",
        "price" => 85,
        "description" => "Boho Decor Plant Hanger For Home Wall Decoration Macrame Wall Hanging Shelf",
        "image" => "https://cdn.dummyjson.com/product-images/26/thumbnail.jpg",
        "category" => "home-decoration",
        "stock" => 20
    ),
    array(
        "id" => 10,
        "name" => "Key Holder",
        "price" => 65,
        "description" => "Attractive DesignMetallic materialFour key hooksReliable & DurablePremium Quality",
        "image" => "https://cdn.dummyjson.com/product-images/30/thumbnail.jpg",
        "category" => "home-decoration",
        "stock" => 17
    ),
    // Add more products here as needed
);

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$database = "mydb";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

if (!$conn) {
    echo "fail coonection";
}
else{
    echo "connected to data successfully";
}






// Define table schema
$table_schema = "CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name     VARCHAR(255),
    price          INT,
    description  VARCHAR(255),
     image     VARCHAR(255),
    category     VARCHAR(255),
    stock         INT
)";

// Create the table
$result = mysqli_query($conn, $table_schema);

if ($result) {
    echo "Table created successfully";
} else {
    echo "Error creating table: ";
}








// Insert data into the table
foreach ($data as $row) {
    $id=$row['id'];
    $name = $row['name'];
    $price = $row['price'];
    $description = $row['description'];
    $image = $row['image'];
    $category = $row['category'];
    $stock = $row['stock'];
    
    $insert_query = "INSERT INTO products (id,name, price,description,image,category,stock) VALUES ('$id','$name', '$price',' $description','$image','$category','$stock')";
    
$final= mysqli_query($conn, $insert_query);

    if ($final) {
        echo "New record inserted successfully";
    } else {
        echo "Error: ";
    }
}

// Close connection


?>
