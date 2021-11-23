<?php
const DBHOST = 'localhost';
const DBUSER = 'root';
const DBPASS = '';
const DBNAME = 'crud_db';

$conn = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO products (name, price, image) VALUES ('W Motors Lykan Hypersport', '3400000', '110.jpg')";
if ($conn->multi_query($sql) === TRUE) {
  echo "New Products are created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>


