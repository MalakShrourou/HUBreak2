<?php
session_start();
if (!$database = mysqli_connect("localhost", "root", "12345678", "hubreak2_db"))
    die("Sorry, could not connect to the server.");
extract($_POST);
$query = "INSERT INTO carts ('Description') VALUES ($desc)";
mysqli_query($database, $query);
mysqli_close($database);
?>