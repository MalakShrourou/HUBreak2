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
            $Q1 = "INSERT INTO carts2(customerID,ResturantID,TotalPrice,Description) VALUES (8,1,'$t','$desc')";
            $result1 = mysqli_query($database, $Q1);
            $id = 1;
        } elseif ($value == 2) {
            $Q1 = "INSERT INTO carts(customerID,ResturantID,TotalPrice,Description) VALUES (8,2,'$t','$desc')";
            $result1 = mysqli_query($database, $Q1);
            $Q1 = "INSERT INTO carts2(customerID,ResturantID,TotalPrice,Description) VALUES (8,2,'$t','$desc')";
            $result1 = mysqli_query($database, $Q1);
            $id = 2;
        } elseif ($value == 3) {
            $Q1 = "INSERT INTO carts(customerID,ResturantID,TotalPrice,Description) VALUES (8,3,'$t','$desc')";
            $result1 = mysqli_query($database, $Q1);
            $Q1 = "INSERT INTO carts2(customerID,ResturantID,TotalPrice,Description) VALUES (8,3,'$t','$desc')";
            $result1 = mysqli_query($database, $Q1);
            $id = 3;
        } elseif ($value == 4) {
            $Q1 = "INSERT INTO carts(customerID,ResturantID,TotalPrice,Description) VALUES (8,4,'$t','$desc')";
            $result1 = mysqli_query($database, $Q1);
            $Q1 = "INSERT INTO carts2(customerID,ResturantID,TotalPrice,Description) VALUES (8,4,'$t','$desc')";
            $result1 = mysqli_query($database, $Q1);
            $id = 4;
        } elseif ($value == 5) {
            $Q1 = "INSERT INTO carts(customerID,ResturantID,TotalPrice,Description) VALUES (8,5,'$t','$desc')";
            $result1 = mysqli_query($database, $Q1);
            $Q1 = "INSERT INTO carts2(customerID,ResturantID,TotalPrice,Description) VALUES (8,5,'$t','$desc')";
            $result1 = mysqli_query($database, $Q1);
            $id = 5;
        } elseif ($value == 6) {
            $Q1 = "INSERT INTO carts(customerID,ResturantID,TotalPrice,Description) VALUES (8,6,'$t','$desc')";
            $result1 = mysqli_query($database, $Q1);
            $Q1 = "INSERT INTO carts2(customerID,ResturantID,TotalPrice,Description) VALUES (8,6,'$t','$desc')";
            $result1 = mysqli_query($database, $Q1);
            $id = 6;
        }
    }
}
mysqli_close($database);
switch ($id) {
    case 1:
        header("Location:invoice_eastern.php");
        break;
    case 2:
        header("Location:invoice_espresso.php");
        break;
    case 3:
        header("Location:invoice_medicine.php");
        break;
    case 4:
        header("Location:invoice_village.php");
        break;
    case 5:
        header("Location:invoice_zaza.php");
        break;
    case 6:
        header("Location:invoice_western.php");
        break;

}

?>