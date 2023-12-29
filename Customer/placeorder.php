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
            $qu1 = "SELECT Time from Orders join products where Orders.ProductID = Products.ID AND resturantID = 1";
            $max = 0;
            $result1 = mysqli_query($database, $qu1);
            while ($row = mysqli_fetch_row($result1)) {
                foreach ($row as $value) {
                    if ($value > $max)
                        $max = $value;
                }
            }
            $Q1 = "INSERT INTO carts(CustomerID,ResturantID,TotalPrice,Description,Time) VALUES ('$ID',1,'$total1','$desc1','$max')";
            $result1 = mysqli_query($database, $Q1);
        } elseif ($value == 2) {
            $qu2 = "SELECT Time from Orders join products where Orders.ProductID= Products.ID AND resturantID=2";
            $max = 0;
            $result2 = mysqli_query($database, $qu2);
            while ($row = mysqli_fetch_row($result2)) {
                foreach ($row as $value) {
                    if ($value > $max)
                        $max = $value;
                }
            }
            $Q2 = "INSERT INTO carts(CustomerID,ResturantID,TotalPrice,Description,Time) VALUES ('$ID',2,'$total2','$desc2','$max')";
            $result2 = mysqli_query($database, $Q2);
        } elseif ($value == 3) {
            $qu3 = "SELECT Time from Orders join products where Orders.ProductID= Products.ID AND resturantID=3";
            $max = 0;
            $result3 = mysqli_query($database, $qu3);
            while ($row = mysqli_fetch_row($result3)) {
                foreach ($row as $value) {
                    if ($value > $max)
                        $max = $value;
                }
            }
            $Q3 = "INSERT INTO carts(CustomerID,ResturantID,TotalPrice,Description,Time) VALUES ('$ID',3,'$total3','$desc3','$max')";
            $result3 = mysqli_query($database, $Q3);
        } elseif ($value == 4) {
            $qu4 = "SELECT Time from Orders join products where Orders.ProductID= Products.ID AND resturantID=4";
            $max = 0;
            $result4 = mysqli_query($database, $qu4);
            while ($row = mysqli_fetch_row($result4)) {
                foreach ($row as $value) {
                    if ($value > $max)
                        $max = $value;
                }
            }
            $Q4 = "INSERT INTO carts(CustomerID,ResturantID,TotalPrice,Description,Time) VALUES ('$ID',4,'$total4','$desc4','$max')";
            $result4 = mysqli_query($database, $Q4);
        } elseif ($value == 5) {
            $qu5 = "SELECT Time from Orders join products where Orders.ProductID= Products.ID AND resturantID=5";
            $max = 0;
            $result5 = mysqli_query($database, $qu5);
            while ($row = mysqli_fetch_row($result5)) {
                foreach ($row as $value) {
                    if ($value > $max)
                        $max = $value;
                }
            }
            $Q5 = "INSERT INTO carts(CustomerID,ResturantID,TotalPrice,Description,Time) VALUES ('$ID',5,'$total5','$desc5','$max')";
            $result5 = mysqli_query($database, $Q5);
        } elseif ($value == 6) {
            $qu6 = "SELECT Time from Orders join products where Orders.ProductID= Products.ID AND resturantID=6";
            $max = 0;
            $result6 = mysqli_query($database, $qu6);
            while ($row = mysqli_fetch_row($result6)) {
                foreach ($row as $value) {
                    if ($value > $max)
                        $max = $value;
                }
            }
            $Q6 = "INSERT INTO carts(CustomerID,ResturantID,TotalPrice,Description,Time) VALUES ('$ID',6,'$total6','$desc6','$max')";
            $result6 = mysqli_query($database, $Q6);
        }
    }
}
mysqli_close($database);
header("Location:Time.php");

?>