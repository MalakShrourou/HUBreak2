<!DOCTYPE html>

<head>
    <title>Change price</title>
    <meta charset="UTF-8">
    <style type="text/css">
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Times New Roman', Times, serif;
    }

    body {
        background-image: url('cover.jpg');
    }

    .res img:hover {
        filter: brightness(65%);
    }

    .res {
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

    .res img {
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

    a {
        text-decoration: none;
        color: transparent;
    }

    .head h1 {
        text-align: center;
        background-color: #f18b05;
        padding-top: 2%;
        padding-bottom: 2%;
        margin-top: 2%;
        font-size: 250%;
        color: white;
        margin-right: 24%;
        margin-left: 25%;
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
            <li><a href="Admin.html">الصفحة الرئيسية</a></li>
        </ul>
    </nav>
    <div class="head">
        <h1>Select a restaurant to CHANGE items PRICE from </h1>
    </div>
    <div class="center">
        <?php
    if (!$database = mysqli_connect("localhost", "root", "12345678", "hubreak2_db"))
      die("Sorry, could not connect to the server.");
    extract($_POST);
    $query = "select ID,Image,name from resturants ";
    $result = mysqli_query($database, $query);
    while ($row = mysqli_fetch_row($result)) {
      print("<div class='res'>");
      $x = 0;
      $link = null;
      foreach ($row as $value) {
        if ($x == 0) {
          if ($value == 1) {
            $link = 'ChangeEastern.php';
          } elseif ($value == 2) {
            $link = 'ChangeEspresso.php';
          } elseif ($value == 3) {
            $link = 'ChangeMedicine.php';
          } elseif ($value == 4) {
            $link = 'ChangeVillage.php';
          } elseif ($value == 5) {
            $link = 'ChangeZaza.php';
          } elseif ($value == 6) {
            $link = 'ChangeWestern.php';
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
</body>

</html>