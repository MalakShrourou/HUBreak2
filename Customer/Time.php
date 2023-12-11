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
        width: 50%;
        margin-left: 100px;
        margin-top: 0;
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
                if ($value == 1) {
                    print("<div class='section'><h4>مطاعم الشرقي</h4>");
                    $Q1 = "SELECT ID,TotalPrice,Time FROM carts WHERE ResturantID=1";
                    $result1 = mysqli_query($database, $Q1);
                    print("<table class='table'>");
                    while ($row = mysqli_fetch_row($result1)) {
                        $x = 0;
                        foreach ($row as $value) {
                            if ($x == 0) {
                                print("<tr><td>$value </td>");
                                print("<td>رقم الطلب</td></tr>");
                            } elseif ($x == 1) {
                                print("<tr><td>$value JD</td>");
                                print("<td>المبلغ الإجمالي</td></tr>");
                            } else {
                                $dbSessionDurationTime = $value * 60 * 1000;
                                print("<tr><td id='demo'></td>");
                                print("<td>الوقت المتبقي</td></tr></table></div>");
                            }
                            $x++;
                        }
                    }
                } elseif ($value == 2) {
                    print("<div class='section'><h4>مطاعم اسبريسو</h4>");
                    $Q2 = "SELECT ID,TotalPrice,Time FROM carts WHERE ResturantID=2";
                    $result2 = mysqli_query($database, $Q2);
                    print("<table class='table'>");
                    while ($row2 = mysqli_fetch_row($result2)) {
                        $x = 0;
                        foreach ($row2 as $value) {
                            if ($x == 0) {
                                print("<tr><td>$value </td>");
                                print("<td>رقم الطلب</td></tr>");
                            } elseif ($x == 1) {
                                print("<tr><td>$value JD</td>");
                                print("<td>المبلغ الإجمالي</td></tr>");
                            } else {
                                $dbSessionDurationTime = $value * 60 * 1000;
                                print("<tr><td id='demo'></td>");
                                print("<td>الوقت المتبقي</td></tr></table></div>");
                            }
                            $x++;
                        }
                    }
                } elseif ($value == 3) {
                    print("<div class='section'><h4>مطاعم الطب</h4>");
                    $Q3 = "SELECT ID,TotalPrice,Time FROM carts WHERE ResturantID=3";
                    $result3 = mysqli_query($database, $Q3);
                    print("<table class='table'>");
                    while ($row3 = mysqli_fetch_row($result3)) {
                        $x = 0;
                        foreach ($row3 as $value) {
                            if ($x == 0) {
                                print("<tr><td>$value </td>");
                                print("<td>رقم الطلب</td></tr>");
                            } elseif ($x == 1) {
                                print("<tr><td>$value JD</td>");
                                print("<td>المبلغ الإجمالي</td></tr>");
                            } else {
                                $dbSessionDurationTime = $value * 60 * 1000;
                                print("<tr><td id='demo'></td>");
                                print("<td>الوقت المتبقي</td></tr></table></div>");
                            }
                            $x++;
                        }
                    }
                } elseif ($value == 4) {
                    print("<div class='section'><h4>مطاعم القرية الطلابية</h4>");
                    $Q4 = "SELECT ID,TotalPrice,Time FROM carts WHERE ResturantID=4";
                    $result4 = mysqli_query($database, $Q4);
                    print("<table class='table'>");
                    while ($row4 = mysqli_fetch_row($result4)) {
                        $x = 0;
                        foreach ($row4 as $value) {
                            if ($x == 0) {
                                print("<tr><td>$value </td>");
                                print("<td>رقم الطلب</td></tr>");
                            } elseif ($x == 1) {
                                print("<tr><td>$value JD</td>");
                                print("<td>المبلغ الإجمالي</td></tr>");
                            } else {
                                $dbSessionDurationTime = $value * 60 * 1000;
                                print("<tr><td id='demo'></td>");
                                print("<td>الوقت المتبقي</td></tr></table></div>");
                            }
                            $x++;
                        }
                    }
                } elseif ($value == 5) {
                    print("<div class='section'><h4>مطاعم ظاظا</h4>");
                    $Q5 = "SELECT ID,TotalPrice,Time FROM carts WHERE ResturantID=5";
                    $result5 = mysqli_query($database, $Q5);
                    print("<table class='table'>");
                    while ($row5 = mysqli_fetch_row($result5)) {
                        $x = 0;
                        foreach ($row5 as $value) {
                            if ($x == 0) {
                                print("<tr><td>$value </td>");
                                print("<td>رقم الطلب</td></tr>");
                            } elseif ($x == 1) {
                                print("<tr><td>$value JD</td>");
                                print("<td>المبلغ الإجمالي</td></tr>");
                            } else {
                                $dbSessionDurationTime = $value * 60 * 1000;
                                print("<tr><td id='demo'></td>");
                                print("<td>الوقت المتبقي</td></tr></table></div>");
                            }
                            $x++;
                        }
                    }
                } elseif ($value == 6) {
                    print("<div class='section'><h4>مطاعم الغربي</h4>");
                    $Q6 = "SELECT ID,TotalPrice,Time FROM carts WHERE ResturantID=6";
                    $result6 = mysqli_query($database, $Q6);
                    print("<table class='table'>");
                    while ($row6 = mysqli_fetch_row($result6)) {
                        $x = 0;
                        foreach ($row6 as $value) {
                            if ($x == 0) {
                                print("<tr><td>$value </td>");
                                print("<td>رقم الطلب</td></tr>");
                            } elseif ($x == 1) {
                                print("<tr><td>$value JD</td>");
                                print("<td>المبلغ الإجمالي</td></tr>");
                            } else {
                                $dbSessionDurationTime = $value * 60 * 1000;
                                print("<tr><td id='demo'></td>");
                                print("<td>الوقت المتبقي</td></tr></table></div>");
                            }
                            $x++;
                        }
                    }
                }
            }
        }
        ?>
    </div>
    <script>
    var millis = <?php echo $dbSessionDurationTime ?>;

    function displaytimer() {
        var hours = Math.floor(millis / 36e5),
            mins = Math.floor((millis % 36e5) / 6e4),
            secs = Math.floor((millis % 6e4) / 1000);
        if (mins <= 0 && secs <= 0) {
            document.getElementById("demo").innerHTML = "الطلب جاهز للاستيلام";
        } else {
            var remainingTime = mins + ':' + secs + ' minutes';
            document.getElementById("demo").innerHTML = remainingTime;
        }
    }
    setInterval(function() {
        millis -= 1000;
        displaytimer();
    }, 1000);
    </script>


</body>

</html>