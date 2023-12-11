<!DOCTYPE html>
<html>

<head>
    <title>Cart</title>
    <meta charset="UTF-8">
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: 'Times New Roman', Times, serif;
            box-sizing: border-box;
        }

        body {
            background-attachment: fixed;
            background-image: url("cover.jpg");
        }

        .section {
            width: 30%;
            font-size: 28px;
            background-color: transparent;
            backdrop-filter: blur(30px);
            height: auto;
            margin: 50px 150px 30px 20px;
            border: 2px solid #f18b05;
            border-radius: 15px;
            padding-bottom: 20px;
        }

        h4 {
            background-color: #f18b05;
            text-align: center;
            padding: 5px;
            width: 60%;
            margin-top: 0;
            margin-left: 75px;
            color: white;
        }

        .table {
            font-size: 22px;
            width: 100%;
            color: rgb(124, 17, 17);
            height: auto;
        }

        .table td {
            text-align: center;
        }

        tr {
            height: 50px;
        }

        .center {
            display: flex;
            flex-direction: row-reverse;
            flex-wrap: wrap;
        }
    </style>
</head>

<body>
    <div class="center">
        <?php
        if (!$database = mysqli_connect("localhost", "root", "12345678", "hubreak2_db"))
            die("Sorry, could not connect to the server.");
        extract($_POST);
        $query = "SELECT DISTINCT ResturantID FROM carts";
        $result = mysqli_query($database, $query);
        while ($row = mysqli_fetch_row($result)) {
            foreach ($row as $value) {
                print("<div class='section'>");
                $Q = "SELECT Name,carts.ID,TotalPrice,Time FROM carts,resturants WHERE ResturantID = $value && resturants.ID= $value ";
                $r = mysqli_query($database, $Q);
                print("<table class='table'>");
                while ($R = mysqli_fetch_row($r)) {
                    $x = 0;
                    foreach ($R as $v) {
                        if ($x == 0) {
                            print("<h4>$v</h4>");
                        } elseif ($x == 1) {
                            print("<tr><td>$v </td>");
                            print("<td>رقم الطلب</td></tr>");
                        } elseif ($x == 2) {
                            print("<tr><td>$v JD</td>");
                            print("<td>المبلغ الإجمالي</td></tr>");
                        } else {
                            $dbSessionDurationTime = $v * 60 * 1000;
                            print("<tr><td id='demo'></td>");
                            print("<td>الوقت المتبقي</td></tr></table></div>");
                        }
                        $x++;
                    }
                }
            }
        }
        ?>
    </div>
    <script>
        var millis = <?php echo $dbSessionDurationTime ?>

        function displaytimer() {
            var hours = Math.floor(millis / 36e5),
                mins = Math.floor((millis % 36e5) / 6e4),
                secs = Math.floor((millis % 6e4) / 1000);
            if (mins <= 0 && secs <= 0) {
                document.getElementById("demo").innerHTML = "الطلب جاهز للاستلام";
            } else {
                var remainingTime = mins + ':' + secs + ' minutes';
                document.getElementById("demo").innerHTML = remainingTime;
            }
        }
        setInterval(function () {
            millis -= 1000;
            displaytimer();
        }, 1000);
    </script>


</body>

</html>