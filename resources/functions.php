<?php


function create_mysql_table(){
    $conn = Connect();

        $conn->query("DROP TABLE IF EXISTS products, orders, orders_products,customers,addresses,payments");
        //deletes table if it already exists
            
    //sql to create table
        $sql = "CREATE TABLE products (
        id INT NOT NULL AUTO_INCREMENT,
        title VARCHAR(255) NOT NULL,
        slug VARCHAR(255) NOT NULL,
        description TEXT,
        price FLOAT NOT NULL,
        image VARCHAR(255),
        stock INT(11) NOT NULL,
        created_at TIMESTAMP,
        updated_at TIMESTAMP,
        PRIMARY KEY (ID)
        )";
    insert_into_table($conn, $sql);

    $sql = "CREATE TABLE orders (
        id INT (11) NOT NULL AUTO_INCREMENT,
        hash VARCHAR(255) NOT NULL,
        total FLOAT NOT NULL,
        address_id INT(11) NOT NULL,
        paid TINYINT(1) NOT NULL,
        customer_id INT(11),
        created_at TIMESTAMP,
        updated_at TIMESTAMP,
        PRIMARY KEY (ID)
        )";
    insert_into_table($conn, $sql);

    $sql = "CREATE TABLE orders_products (
        id INT (11) NOT NULL AUTO_INCREMENT,
        order_id INT(11) NOT NULL,
        product_id INT(11) NOT NULL,
        quantity INT(11) NOT NULL,
        PRIMARY KEY (ID)
        )";
    insert_into_table($conn, $sql);

    $sql = "CREATE TABLE customers (
        id INT (11) NOT NULL AUTO_INCREMENT,
        name VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL,
        created_at TIMESTAMP,
        updated_at TIMESTAMP,
        PRIMARY KEY (ID)
        )";
    insert_into_table($conn, $sql);

    $sql = "CREATE TABLE addresses (
        id INT (11) NOT NULL AUTO_INCREMENT,
        address1 VARCHAR(255) NOT NULL,
        address2 VARCHAR(255),
        city VARCHAR(255) NOT NULL,
        state VARCHAR(2) NOT NULL,
        zip VARCHAR(10) NOT NULL,
        created_at TIMESTAMP,
        updated_at TIMESTAMP,
        PRIMARY KEY (ID)
        )";
    insert_into_table($conn, $sql);

    $sql = "CREATE TABLE payments (
        id INT (11) NOT NULL AUTO_INCREMENT,
        order_id INT(11) NOT NULL,
        failed TINYINT(1) NOT NULL,
        transaction_id VARCHAR(255),
        created_at TIMESTAMP,
        updated_at TIMESTAMP,
        PRIMARY KEY (ID)
        )";
    insert_into_table($conn, $sql);


$conn->close();//close connection
}
//END Create MYSQL Table******************************

function insert_into_table($connection, $data){
        if ($connection->query($data) === TRUE) {
            echo "Table created successfully" . '<br>';
        } else {
            echo "Error creating table: " . $connection->error;//outputs error code
        }       
}


/* Connect - establishes a connection to a MYSQL database on a server*/
function Connect()
{
 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "";
 $dbname = "marronja01";
 
 // Create connection
 $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname) or die("Connection failed: " . $conn->connect_error);

 return $conn;
}

//THIS WILL CREATE THE DATABASE TABLES

//create_mysql_table();


?>