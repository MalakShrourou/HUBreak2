<?php
session_start();
?>
<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <style>
    .rating3 {
        width: 100%;
        text-align: center;
        position: relative;
        direction: ltr;
    }

    .rating3 input {
        position: absolute;
        width: 35px;
        height: 50px;
        cursor: pointer;
        transform: translateX(52px);
        opacity: 0;
        z-index: 5;
        text-align: center;
    }

    .rating3 .star3 {
        display: inline-block;
        font-family: FontAwesome;
        font-size: 30px;
        text-align: center;
        color: #FBB202;
        cursor: pointer;
        margin: 0;
        padding: 0;
    }

    .rating3 .star3::after {
        content: '\f005';
    }
    </style>
</head>

</html>
<?php
if (!$database = mysqli_connect("localhost", "root", "12345678", "hubreak2_db"))
    die("Sorry, could not connect to the server.");
extract($_POST);
$query = "select rate from rate where ResturantID=1";
$result = mysqli_query($database, $query);
$total = 0;
$count = 0;
while ($row = mysqli_fetch_assoc($result)) {
    $total += $row['rate'];
    $count++;
}
$avg = $total / $count;
if ($avg >= 1) {
    print("<span class='rating3'><input type='radio' name='s' disabled checked><span class='star3'></span></span>");
}
if ($avg >= 2) {
    print("<span class='rating3'><input type='radio' name='s' disabled checked><span class='star3'></span></span>");
}
if ($avg >= 3) {
    print("<span class='rating3'><input type='radio' name='s' disabled checked><span class='star3'></span></span>");
}
if ($avg >= 4) {
    print("<span class='rating3'><input type='radio' name='s' disabled checked><span class='star3'></span></span>");
}
if ($avg >= 5) {
    print("<span class='rating3'><input type='radio' name='s' disabled checked><span class='star3'></span></span>");
}
print("<h2>:تقييم المطعم</h2>");
mysqli_query($database, $query);
mysqli_close($database);
?>