<?php
if (!$database = mysqli_connect("localhost", "root", "12345678"))
    die("Sorry, could not connect to the server.");
if (!mysqli_select_db($database, "hubreak2_db"))
    die("Sorry, could not find database.");
$parameter = $_SERVER['QUERY_STRING'];
$query = "delete from Orders where Orders.$parameter";
if (!$result = mysqli_query($database, $query))
    die("Sorry, Item not deleted.");
mysqli_close($database);
header("Location:cart.php");
?>