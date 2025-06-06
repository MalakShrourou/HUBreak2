<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Zaza - Reviews</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: 'Times New Roman', Times, serif;
            box-sizing: border-box;
        }

        body {
            color: rgb(124, 17, 17);
            background-attachment: fixed;
        }

        .menu-bar {
            background: #f18b05;
            text-align: right;
            height: 40px;
            margin-right: 10%;
            padding-right: 5px;
            font-size: large;
        }

        .menu-bar ul {
            display: inline-flex;
            list-style: none;
            color: #fff;
        }

        .menu-bar ul li {
            width: 150px;
            margin: 0px;
            padding: 10px 0px;
            text-align: center;
        }

        .menu-bar ul li a {
            text-decoration: none;
            color: #fff;
        }

        .menu {
            display: none;
        }

        .menu-bar ul li:hover {
            background-color: #fda025;
        }

        .menu-bar ul li:hover .menu {
            display: block;
            position: absolute;
            background-color: #FBB202;
            margin-top: 10px;
        }

        .menu-bar ul li:hover .menu ul {
            display: block;
        }

        .menu-bar ul li:hover .menu ul li {
            width: 150px;
            padding: 10px;
            border-bottom: 1px dotted #fff;
            background: transparent;
            border-radius: 0;
            text-align: center;
        }

        .menu-bar ul li:hover .menu ul li:last-child {
            border-bottom: none;
        }

        .menu-bar ul li:hover .menu ul li a:hover {
            color: rgb(124, 17, 17);
        }

        .logo {
            width: 10%;
            height: 40px;
            right: 0;
            position: absolute;
        }

        h1,
        h2,
        h3 {
            text-align: center;
        }

        footer {
            background: #f18b05;
            color: white;
            text-align: center;
            padding: 10px;
        }

        .intro {
            background-color: #fda025;
            width: 100%;
            color: white;
            padding: 2% 0;
            font-size: xx-large;
        }

        h2 {
            padding: 30px;
        }

        .show_rate {
            display: flex;
            flex-direction: column;
            width: 40%;
            text-align: center;
        }

        .total-rate {
            width: 30%;
            border-radius: 15px;
            background-color: rgb(241, 238, 238);
            font-size: 20px;
            padding: 20px;
            padding-left: 50px;
            text-align: center;
            margin: 50px auto;
        }

        .rating3 {
            position: absolute;
            width: 35px;
            height: 50px;
            cursor: pointer;
            transform: translateX(52px);
            opacity: 0;
            z-index: 5;
        }

        .star3 {
            font-family: FontAwesome;
            font-size: 30px;
            color: #FBB202;
            cursor: pointer;
            margin: 0;
            padding: 5px;
        }

        .star3::after {
            content: '\f005';
        }

        .rate {
            width: 40%;
            height: auto;
            border-radius: 15px;
            background-color: rgb(241, 238, 238);
            font-size: 18px;
            padding: 10px;
            margin: 20px auto;
            text-align: center;
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

<body>
    <nav class="menu-bar">
        <img src="logo.jpg" class="logo">
        <ul>
            <li class="rest"><a href=" #">التقييمات</a>
                <div class="menu">
                    <ul>
                        <li><a href="ReviewsZaza.php">مطعم ظاظا</a></li>
                        <li><a href="ReviewsVillage.php">مطعم القرية الطلابية</a></li>
                        <li><a href="ReviewsEspresso.php">مطعم اسبريسو</a></li>
                        <li><a href="ReviewsEastern.php">مطعم الشرقي</a></li>
                        <li><a href="ReviewsWestern.php">مطعم الغربي</a></li>
                        <li><a href="ReviewsMedicine.php">مطعم الطب</a></li>
                    </ul>
                </div>
            </li>
            <li class="rest"><a href=" #">إضافة إعلان</a>
                <div class="menu">
                    <ul>
                        <li><a href="SubmitZaza.php">مطعم ظاظا</a></li>
                        <li><a href="SubmitVillage.php">مطعم القرية الطلابية</a></li>
                        <li><a href="SubmitEspresso.php">مطعم اسبريسو</a></li>
                        <li><a href="SubmitEastern.php">مطعم الشرقي</a></li>
                        <li><a href="SubmitWestern.php">مطعم الغربي</a></li>
                        <li><a href="SubmitMedicine.php">مطعم الطب</a></li>
                    </ul>
                </div>
            </li>
            <li class="rest"><a href=" #">تعديل الأسعار</a>
                <div class="menu">
                    <ul>
                        <li><a href="ChangeZaza.php">مطعم ظاظا</a></li>
                        <li><a href="ChangeVillage.php">مطعم القرية الطلابية</a></li>
                        <li><a href="ChangeEspresso.php">مطعم اسبريسو</a></li>
                        <li><a href="ChangeEastern.php">مطعم الشرقي</a></li>
                        <li><a href="ChangeWestern.php">مطعم الغربي</a></li>
                        <li><a href="ChangeMedicine.php">مطعم الطب</a></li>
                    </ul>
                </div>
            </li>
            <li class="rest"><a href=" #">حذف وجبة</a>
                <div class="menu">
                    <ul>
                        <li><a href="DeleteZaza.php">مطعم ظاظا</a></li>
                        <li><a href="DeleteVillage.php">مطعم القرية الطلابية</a></li>
                        <li><a href="DeleteEspresso.php">مطعم اسبريسو</a></li>
                        <li><a href="DeleteEastern.php">مطعم الشرقي</a></li>
                        <li><a href="DeleteWestern.php">مطعم الغربي</a></li>
                        <li><a href="DeleteMedicine.php">مطعم الطب</a></li>
                    </ul>
                </div>
            </li>
            <li class="rest"><a href=" #">إضافة وجبة</a>
                <div class="menu">
                    <ul>
                        <li><a href="AddZaza.php">مطعم ظاظا</a></li>
                        <li><a href="AddVillage.php">مطعم القرية الطلابية</a></li>
                        <li><a href="AddEspresso.php">مطعم اسبريسو</a></li>
                        <li><a href="AddEastern.php">مطعم الشرقي</a></li>
                        <li><a href="AddWestern.php">مطعم الغربي</a></li>
                        <li><a href="AddMedicine.php">مطعم الطب</a></li>
                    </ul>
                </div>
            </li>
            <li><a href="Admin.html">الصفحة الرئيسية</a></li>
        </ul>
    </nav>
    <div class="intro">
        <h1>مطاعم ظاظا</h1>
        <h3>الموقع : بجانب مبنى مطاعم الجامعة</h3>
    </div>
    <div class="total-rate">
        <?php
        if (!$database = mysqli_connect("localhost", "root", "12345678", "hubreak2_db"))
            die("Sorry, could not connect to the server.");
        extract($_POST);
        $query = "select rate from rate where ResturantID=5";
        $result = mysqli_query($database, $query);
        $total = 0;
        $count = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $total += $row['rate'];
            $count++;
        }
        $avg = $total / $count;
        if ($avg >= 1) {
            print("<input type='radio' name='s' class='rating3' disabled checked><span class='star3'></span>");
        }
        if ($avg >= 2) {
            print("<input type='radio' name='s' class='rating3' disabled checked><span class='star3'></span>");
        }
        if ($avg >= 3) {
            print("<input type='radio' name='s' class='rating3' disabled checked><span class='star3'></span>");
        }
        if ($avg >= 4) {
            print("<input type='radio' name='s' class='rating3' disabled checked><span class='star3'></span>");
        }
        if ($avg >= 5) {
            print("<input type='radio' name='s' class='rating3' disabled checked><span class='star3'></span>");
        }
        print("<span>:تقييم المطعم</span>");
        mysqli_close($database);
        ?>
    </div>
    <?php
    if (!$database = mysqli_connect("localhost", "root", "12345678", "hubreak2_db"))
        die("Sorry, could not connect to the server.");
    extract($_POST);
    $query = "select Name,rate,comment from rate,customers where customers.ID=rate.customerID and resturantID=5";
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
    mysqli_close($database);
    ?>
    <footer>
        <p>Developed By</p>
        <p>HU Break Team &copy;</p>
    </footer>
</body>

</html>