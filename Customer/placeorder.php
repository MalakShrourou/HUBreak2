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
$query = "SELECT DISTINCT resturantID FROM Orders";
$result = mysqli_query($database, $query);
while ($row = mysqli_fetch_row($result)) {
    foreach ($row as $value) {
        if ($value == 1) {
            $Q1 = "INSERT INTO carts VALUES ('','3','1','$total1','','$desc1')";
            $result1 = mysqli_query($database, $Q1);
        } elseif ($value == 2) {
            $Q2 = "INSERT INTO carts VALUES ('','3','2','$total2','','$desc2')";
            $result2 = mysqli_query($database, $Q2);
        }
    }
}
mysqli_close($database);
?>