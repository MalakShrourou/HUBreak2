<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: login.php');
    exit();
}
if (!$database = mysqli_connect("localhost", "root", "12345678", "hubreak2_db"))
    die("Sorry, could not connect to the server.");
extract($_POST);
$query = "SELECT DISTINCT resturantID FROM Orders";
$result = mysqli_query($database, $query);
while ($row = mysqli_fetch_row($result)) {
    foreach ($row as $value) {
        if ($value == 1) {
            $Q1 = "INSERT INTO carts(customerID,ResturantID,TotalPrice,Description) VALUES (8,1,'$t','$desc')";
            $result1 = mysqli_query($database, $Q1);
        } elseif ($value == 2) {
            $Q1 = "INSERT INTO carts(customerID,ResturantID,TotalPrice,Description) VALUES (8,2,'$t','$desc')";
            $result1 = mysqli_query($database, $Q1);
        } elseif ($value == 3) {
            $Q1 = "INSERT INTO carts(customerID,ResturantID,TotalPrice,Description) VALUES (8,3,'$t','$desc')";
            $result1 = mysqli_query($database, $Q1);
        } elseif ($value == 4) {
            $Q1 = "INSERT INTO carts(customerID,ResturantID,TotalPrice,Description) VALUES (8,4,'$t','$desc')";
            $result1 = mysqli_query($database, $Q1);
        } elseif ($value == 5) {
            $Q1 = "INSERT INTO carts(customerID,ResturantID,TotalPrice,Description) VALUES (8,5,'$t','$desc')";
            $result1 = mysqli_query($database, $Q1);
        } elseif ($value == 6) {
            $Q1 = "INSERT INTO carts(customerID,ResturantID,TotalPrice,Description) VALUES (8,6,'$t','$desc')";
            $result1 = mysqli_query($database, $Q1);
        }
    }
}
mysqli_close($database);
header("Location:invoice.php");

?>