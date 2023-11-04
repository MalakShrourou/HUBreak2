<?php
if (!$database = mysqli_connect("localhost", "root", "12345678", "hubreak2_db"))
    die("Sorry, could not connect to the server.");
extract($_POST);
$query1 = "insert into products (Image, Name, Price) values ('$meal_image','$meal_name','$meal_price')";
mysqli_query($database, $query1);
mysqli_close($database);
header("Location: add_zaza.php");
?>
if (!$database = mysqli_connect("localhost", "root", "12345678", "hubreak2_db"))
die("Sorry, could not connect to the server.");
extract($_POST);
$query2 = "insert into products (Image, Name, Price) values ('$meal_image','$meal_name','$meal_price')";
mysqli_query($database, $query2);
mysqli_close($database);
header("Location: add_zaza.php");
?>