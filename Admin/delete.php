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
$query = "DELETE from resturantproducts where productId=$ID AND resturantId=$RestID ";
mysqli_query($database, $query);
mysqli_close($database);
header("Location:javascript://history.go(-1)");
?>