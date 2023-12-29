<?php
if (!$database = mysqli_connect("localhost", "root", "12345678", "hubreak2_db"))
    die("Sorry, could not connect to the server.");
extract($_POST);
$query = "INSERT INTO Orders (ProductID , resturantID , price) VALUES ($ID, $restID ,$price)";
mysqli_query($database, $query);
mysqli_close($database);
header("Refresh:0; url=$link");
?>