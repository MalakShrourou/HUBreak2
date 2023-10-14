<?php
session_start();
?>
<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <style>
        * {
            font-family: 'Times New Roman', Times, serif;
            box-sizing: border-box;
        }

        body {
            color: rgb(124, 17, 17);
            background-attachment: fixed;
        }

        .rate {
            width: 200px;
            height: auto;
            border-radius: 15px;
            background-color: rgb(241, 238, 238);
            font-size: 18px;
            margin: 10px;
            padding: 10px;
        }

        .show {
            position: absolute;
            width: 35px;
            height: 50px;
            cursor: pointer;
            transform: translateX(52px);
            opacity: 0;
            z-index: 5;
        }

        .star2 {
            display: inline-block;
            font-family: FontAwesome;
            font-size: 30px;
            color: #FBB202;
            cursor: pointer;
            margin: 0;
            padding: 0;
        }

        .star2::after {
            content: '\f005';
        }
    </style>
</head>

</html>
<?php
if (!$database = mysqli_connect("localhost", "root", "12345678", "hubreak2_db"))
    die("Sorry, could not connect to the server.");
extract($_POST);
$query = "select Name,rate,comment from rate,customers where resturantID=1 and customers.ID=rate.customerID and rate.rate >= 3";
if (!$result = mysqli_query($database, $query))
    die("wrong query");
while ($row = mysqli_fetch_row($result)) {
    $x = 0;
    print("<div class='rate'>");
    foreach ($row as $value) {
        if ($x == 1) {
            if ($value >= 1) {
                print("<input type='radio' name='s' class='show' disabled checked><span class='star2'></span>");
            }
            if ($value >= 2) {
                print("<input type='radio' name='s' class='show' disabled checked><span class='star2'></span>");
            }
            if ($value >= 3) {
                print("<input type='radio' name='s' class='show' disabled checked><span class='star2'></span>");
            }
            if ($value >= 4) {
                print("<input type='radio' name='s' class='show' disabled checked><span class='star2'></span>");
            }
            if ($value >= 5) {
                print("<input type='radio' name='s' class='show' disabled checked><span class='star2'></span>");
            }
            print("<br>");
        } else {
            print("<span class='text'>$value</span><br>");
        }
        $x++;
    }
    print("</div>");
}
mysqli_query($database, $query);
mysqli_close($database);
?>