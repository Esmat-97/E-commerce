-- drop table users;
  select * from users;	


 SET SQL_SAFE_UPDATES = 0;

-- drop table products;
select * from products;



drop table messages;
select * from messages;



drop table orders;
select * from orders;	



update users set role='admin' where user_id=1;


CREATE TABLE IF NOT EXISTS users(
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    title  VARCHAR(255),
    lname  VARCHAR(255),
    email VARCHAR(255) unique,
      password   VARCHAR(255),
      role enum ('admin','customer') default 'customer'
   );

CREATE TABLE IF NOT EXISTS products (
    product_id INT AUTO_INCREMENT PRIMARY KEY,
    product_name   VARCHAR(255)   unique,
	price     INT,
     image    VARCHAR(255),
    stock      INT , 
    user_id   int,
     FOREIGN KEY (user_id) REFERENCES users (user_id)
);


CREATE TABLE IF NOT EXISTS messages (
    message_id int AUTO_INCREMENT PRIMARY KEY,
    user_id int,
     message_date datetime,
       message varchar(255) unique,
       foreign key (user_id) references users (user_id)
);

CREATE TABLE IF NOT EXISTS orders (
  order_id int AUTO_INCREMENT PRIMARY KEY ,
  user_id int,
  product_id int ,
  order_date datetime,
status enum ('accepted','pending') default 'pending',
foreign key (user_id) references users (user_id),
foreign key (product_id) references products (product_id)
);

 CREATE TABLE IF NOT EXISTS reviews (
  review_id int AUTO_INCREMENT PRIMARY KEY ,
  user_id int,
  review_date datetime,
  review varchar(255) unique,
status enum ('verified','pending') default 'pending',
foreign key (user_id) references users (user_id)
);