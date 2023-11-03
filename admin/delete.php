<?php
    if (!$database = mysqli_connect("localhost", "root", "12345678", "hubreak2_db"))
        die("Sorry, could not connect to the server.");
    extract($_POST);
    $query2 = "delete from products where products.ID = $ID";
    mysqli_query($database, $query2);
    mysqli_close($database);
    header("Location: delete_zaza.php");
    ?>
