<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: login.php');
    exit();
}
$ID = $_SESSION['ID'];
if (!$database = mysqli_connect("localhost", "root", "12345678", "hubreak2_db"))
    die("Sorry, could not connect to the server.");
extract($_POST);
$query = "INSERT INTO rate VALUES (null , '$ID' , '$RestID' , '$rate' , '$desc')";
mysqli_query($database, $query);
mysqli_close($database);
header("location:javascript://history.go(-1)");
?>