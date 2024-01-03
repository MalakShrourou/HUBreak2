<?php
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: login.php');
    exit();
}

if (!$database = mysqli_connect("localhost", "root", "12345678", "hubreak2_db"))
    die("Sorry, could not connect to the server.");
extract($_POST);
$query = "INSERT INTO Orders (ProductID , resturantID , Quantity , price,frompos,payed) VALUES ($ID, $restID ,$quantity ,$price,0,0)";
mysqli_query($database, $query);
mysqli_close($database);
header("location:javascript://history.go(-1)");
?>