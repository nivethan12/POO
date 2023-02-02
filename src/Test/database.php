<?php

$host = 'localhost';
$user = 'root';
$password = 'root';
$dbname = 'shop';

$conn = mysqli_connect($host, $user, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "Connected successfully" . PHP_EOL;

$createCartTableSQL = "CREATE table IF NOT EXISTS cart (
    id INT(6) NOT NULL,
    num_product INT(6) NOT NULL,
    quantity INT(6) NOT NULL
)";

if (!mysqli_query($conn, $createCartTableSQL)) {
    echo "Error creating table cart: " . mysqli_error($conn);
}

echo "Table cart created successfully" . PHP_EOL;

$createProductTableSQL = "CREATE table IF NOT EXISTS product (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    price INT(6) NOT NULL,
    stock INT(6) NOT NULL
)";

if (!mysqli_query($conn, $createProductTableSQL)) {
    echo "Error creating table product: " . mysqli_error($conn);
}

echo "Table product created successfully" . PHP_EOL;

mysqli_close($conn);