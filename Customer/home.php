<?php
session_start();
?>
<!Doctype html>

<html>

<head>
    <title>HU Break</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <meta charset="UTF-8">
    <style type="text/css">
        body {
            background-image: url("cover.jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }

        * {
            margin: 0;
            padding: 0;
            font-family: 'Times New Roman', Times, serif;
            box-sizing: border-box;
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
            width: 120px;
            margin: 0px;
            padding: 10px 0px;
            text-align: center;
        }

        .menu-bar ul li a {
            text-decoration: none;
            color: #fff;
            padding-right: 10px;
        }

        .menu,
        .user {
            display: none;
        }

        .menu-bar ul li:hover {
            background-color: #fda025;
        }

        .menu-bar ul li:hover .menu,
        .menu-bar ul li:hover .user {
            display: block;
            position: absolute;
            background-color: #FBB202;
            margin-top: 10px;
            margin-left: -20px;
        }

        .menu-bar ul li:hover .menu ul,
        .menu-bar ul li:hover .user ul {
            display: block;
        }

        .menu-bar ul li:hover .menu ul li,
        .menu-bar ul li:hover .user ul li {
            width: 150px;
            padding: 10px;
            border-bottom: 1px dotted #fff;
            background: transparent;
            border-radius: 0;
            text-align: center;
        }

        .menu-bar ul li:hover .menu ul li:last-child,
        .menu-bar ul li:hover .user ul li:last-child {
            border-bottom: none;
        }

        .menu-bar ul li:hover .menu ul li a:hover,
        .menu-bar ul li:hover .user ul li a:hover {
            color: rgb(124, 17, 17);
        }

        .intro {
            background-color: #fda025;
            width: 100%;
            height: 100%;
            padding-bottom: 4%;
        }

        .logo {
            width: 10%;
            height: 40px;
            right: 0;
            position: absolute;
        }

        .intro h1 {
            color: #fff;
            font-size: 70px;
            padding-left: 8%;
            padding-right: 8%;
            padding-bottom: 8%;
            padding-top: 14%;
        }

        .logo2 {
            margin-top: 2%;
            float: right;
            margin-right: 4%;
        }

        .rest {
            width: 27%;
            margin: 20px;
            text-align: center;
            border-style: solid;
            border-color: #fff;
            background: #fff;
            border-radius: 30px;
            color: white;
            box-shadow: -30px 30px 20px rgba(0, 0, 0, 0.3);
        }

        .rest img {
            width: 70%;
            height: auto;
            border-radius: 200px;
            border-style: solid;
            margin: 20px;
        }

        .center {
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            margin: 100px 0 100px 11%;
        }

        .name {
            text-align: center;
            font-size: 24px;
            color: rgb(124, 17, 17);
        }

        footer {
            background-color: #f18b05;
            color: white;
            font-weight: bold;
            text-align: center;
            padding: 15px;
        }

        footer img {
            cursor: pointer;
        }

        a {
            text-decoration: none;
            color: transparent;
        }

        .cart-icon {
            display: inline-block;
            width: 18px;
            height: 18px;
            background-image: url("cart-icon.png");
            background-size: contain;
        }

        .user-icon {
            display: inline-block;
            width: 18px;
            height: 18px;
            background-image: url("user.png");
            background-size: contain;
        }
    </style>
</head>

<body>
    <nav class="menu-bar">
        <img src="logo.jpg" class="logo">
        <ul>
            <li><a href="cart.php"><span class="cart-icon"></span></a></li>
            <li><a href="#"><span class="user-icon"></span></a>
                <div class="user">
                    <ul>
                        <li><a href="Logout.php">تسجيل الخروج</a></li>
                        <li><a href="ChangePassword.php">تغيير كلمة السر</a></li>
                        <li><a href="DeleteAccount.php">حذف الحساب</a></li>
                    </ul>
                </div>
            </li>
            <li><a href="#">العروض</a></li>
            <li><a href="Home.php#cont">من نحن</a></li>
            <li><a href=" #">المطاعم</a>
                <div class="menu">
                    <ul>
                        <li><a href="Zaza.php">مطعم ظاظا</a></li>
                        <li><a href="Village.php">مطعم القرية الطلابية</a></li>
                        <li><a href="Espresso.php">مطعم اسبريسو</a></li>
                        <li><a href="Eastern.php">مطعم الشرقي</a></li>
                        <li><a href="Western.php">مطعم الغربي</a></li>
                        <li><a href="Medicine.php">مطعم الطب</a></li>
                    </ul>
                </div>
            </li>
            <li><a href="Home.php">الصفحة الرئيسية</a></li>
        </ul>
    </nav>

    <div class="intro">
        <img src="FastFood.png" class="logo2">
        <h1><em>It's not just food, It's an Experience.</em></h1>
        <br><br><br><br>
    </div>
    <div class="center">
        <?php
        if (!$database = mysqli_connect("localhost", "root", "12345678", "hubreak2_db"))
            die("Sorry, could not connect to the server.");
        extract($_POST);
        $query = "select ID,Image,name from resturants ";
        $result = mysqli_query($database, $query);
        while ($row = mysqli_fetch_row($result)) {
            print("<div class='rest'>");
            $x = 0;
            $link = null;
            $RestID = 0;
            foreach ($row as $value) {
                if ($x == 0) {
                    if ($value == 1) {
                        $link = "eastern.php";
                        $RestID = 1;
                    } elseif ($value == 2) {
                        $link = "Espresso.php";
                        $RestID = 2;
                    } elseif ($value == 3) {
                        $link = "medicine.php";
                        $RestID = 3;
                    } elseif ($value == 4) {
                        $link = "village.php";
                        $RestID = 4;
                    } elseif ($value == 5) {
                        $link = "zaza.php";
                        $RestID = 5;
                    } elseif ($value == 6) {
                        $link = "western.php";
                        $RestID = 6;
                    }
                }
                if ($x == 1)
                    print("<a href='$link'><img src='$value'></img></a><br>");
                elseif ($x == 2) {
                    print("<a href='$link'><span class='name'>$value</span></a><br><br>");
                }
                $x++;
            }
            print("</div>");
        }
        mysqli_close($database);
        ?>
    </div>
    <footer id="cont">
        <h1 style="margin-top: 20px;">نبذة عنا</h1>
        <p style="margin-top: 10px;"> فريق طلابي من الجامعة الهاشمية حبينا نخدم زملائناالطلاب <br>بتوفير وقتهم وتقديم
            العروض الخاصة فيهم</p>
        <br>
        <img src="instagram.png" width="25px">
        <img src="facebook.png" width="25px">
        <img src="twitter.png" width="25px">
        <br><br>
        <hr>
        <br>
        <h2>Developed By</h2>
        <h3>HU Break Team <span>&copy</span></h3>
    </footer>
</body>

</html>