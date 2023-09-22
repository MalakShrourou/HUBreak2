<?php
if (!$database = mysqli_connect("localhost", "root", "12345678", "hubreak2_db"))
    die("Sorry, could not connect to the server.");
extract($_POST);
$query = "INSERT INTO Orders (ProductID , resturantID , Quantity) VALUES ($ID, $restID ,$quantity)";
mysqli_query($database, $query);
mysqli_close($database);
header("location:javascript://history.go(-1)");
?>