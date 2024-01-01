<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE HTML>

<head>
    <title>Administrator page</title>
    <meta charset="UTF-8">
    <style type="text/css">
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Times New Roman', Times, serif;
    }

    body {
        background-color: #f18b05;
        background-image: url('cover.jpg');
    }

    .column {
        float: left;
        width: 33.33%;
        padding: 5px;
    }

    a:hover {
        filter: brightness(65%);
    }

    .row::after {
        content: "";
        clear: both;
        display: table;
    }

    .head h1 {
        text-align: center;
        background-color: #f18b05;
        padding-top: 2%;
        padding-bottom: 2%;
        margin-top: 2%;
        font-size: 300%;
        color: white;
        margin-right: 24%;
        margin-left: 27%;
    }

    .sec {
        width: 250px;
        height: 150%;
        margin-left: 75%;
        margin-top: 5%;
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
            <li><a href="Admin.php">الصفحة الرئيسية</a></li>
        </ul>
    </nav>
    <div class="head">
        <h1>CHOOSE YOUR ACTION</h1>
    </div>
    <div class="row">
        <div class="column">
            <a href="AddItems.php"><img src="AddItems.jpg" alt="Add Items" class="sec"></a>
        </div>
        <div class="column">
            <a href="DeleteItems.php">
                <img src="DeleteItems.jpg" alt="Delete Items" class="sec">
            </a>
        </div>
    </div>
    <div class="row">
        <div class="column">
            <a href="ChangePrices.php">
                <img src="ChangePrices.jpg" alt="Change Prices" class="sec">
            </a>
        </div>
        <div class="column">
            <a href="SubmitPosters.php">
                <img src="SubmitPosters.jpg" alt="Submit Posters" class="sec">
            </a>
        </div>
    </div>
    <div class="column" style="margin-left: 17%;">
        <a href=" BrowseReviews.php">
            <img src="BrowseReviews.jpg" alt="Browse Reviews" class="sec">
        </a>
    </div>

</body>

</html>