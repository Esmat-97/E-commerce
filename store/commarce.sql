
CREATE TABLE IF NOT EXISTS users(
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    title  VARCHAR(255),
    lname  VARCHAR(255),
    email VARCHAR(255),
      password   VARCHAR(255),
      role enum ('admin','customer') default 'customer'
   );

CREATE TABLE IF NOT EXISTS products (
    product_id INT AUTO_INCREMENT PRIMARY KEY,
    product_name     VARCHAR(255),
    price          INT,
     image     VARCHAR(255),
    category     VARCHAR(255),
    stock       INT , 
    user_id int
    
);





 drop table users;
  select * from users;
--  DELETE FROM users;

--  SET SQL_SAFE_UPDATES = 0;

drop table products;
select * from products;
--  DELETE FROM products;
