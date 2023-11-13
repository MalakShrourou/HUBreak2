<?php
if (!$database = mysqli_connect("localhost", "root", "12345678", "hubreak2_db"))
    die("Sorry, could not connect to the server.");
extract($_POST);
$query1 = "insert into products (Image, Name) values ('$meal_image','$meal_name')";
mysqli_query($database, $query1);
$query2 = "insert into resturantproducts values ((SELECT MAX(ID) FROM products),'$RestID','$meal_price')";
mysqli_query($database, $query2);
mysqli_close($database);
header("Location:javascript://history.go(-1)");
?>