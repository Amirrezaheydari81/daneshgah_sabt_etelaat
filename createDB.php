<?php
include 'db.php';

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("ارتباط بر قرار نشد: " . $conn->connect_error);
}
// Create database
$sql = "CREATE DATABASE newctm";
if ($conn->query($sql) === TRUE) {
    echo "دیتا بیس با موفقیت ساخته شد";
} else {
    echo "خطا: " . $conn->error;
}
$conn->close();

// Create Table Database
$connNew = new mysqli($servername, $username, $password, $dbname);
$sql_create_table = "CREATE TABLE comment(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(50) NOT NULL,
    comment VARCHAR(300) NOT NULL
    )";

if ($connNew->query($sql_create_table)===TRUE) {
    echo "Create Table OK";
}else {
    echo "Error Create Table :" . $connNew->error;
}

$connNew->close();