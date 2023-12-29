<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: login.php');
    exit();
}
if (!$database = mysqli_connect("localhost", "root", "12345678"))
    die("Sorry, could not connect to the server.");
if (!mysqli_select_db($database, "hubreak2_db"))
    die("Sorry, could not find database.");
extract($_POST);
$query = "delete from Orders where ID = $Id";
$result = mysqli_query($database, $query);
if (!$result)
    die("Sorry, Item not deleted.");
mysqli_close($database);
header("Location:cart.php");
?>