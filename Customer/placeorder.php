<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: login.php');
    exit();
}
?>
<?php
if (!$database = mysqli_connect("localhost", "root", "12345678", "hubreak2_db"))
    die("Sorry, could not connect to the server.");
extract($_POST);
$ID = $_SESSION['ID'];
$query = "SELECT DISTINCT resturantID FROM Orders";
$result = mysqli_query($database, $query);
while ($row = mysqli_fetch_row($result)) {
    foreach ($row as $value) {
        if ($value == 1) {
            $Q1 = "INSERT INTO carts(CustomerID,ResturantID,TotalPrice,Description) VALUES ('$ID',1,'$total1','$desc1')";
            $result1 = mysqli_query($database, $Q1);
        } elseif ($value == 2) {
            $Q2 = "INSERT INTO carts(CustomerID,ResturantID,TotalPrice,Description) VALUES ('$ID',2,'$total2','$desc2')";
            $result2 = mysqli_query($database, $Q2);
        } elseif ($value == 3) {
            $Q3 = "INSERT INTO carts(CustomerID,ResturantID,TotalPrice,Description) VALUES ('$ID',3,'$total3','$desc3')";
            $result3 = mysqli_query($database, $Q3);
        } elseif ($value == 4) {
            $Q4 = "INSERT INTO carts(CustomerID,ResturantID,TotalPrice,Description) VALUES ('$ID',4,'$total4','$desc4')";
            $result4 = mysqli_query($database, $Q4);
        } elseif ($value == 5) {
            $Q5 = "INSERT INTO carts(CustomerID,ResturantID,TotalPrice,Description) VALUES ('$ID',5,'$total5','$desc5')";
            $result5 = mysqli_query($database, $Q5);
        } elseif ($value == 6) {
            $Q6 = "INSERT INTO carts(CustomerID,ResturantID,TotalPrice,Description) VALUES ('$ID',6,'$total6','$desc6')";
            $result6 = mysqli_query($database, $Q6);
        }
    }
}
mysqli_close($database);
?>