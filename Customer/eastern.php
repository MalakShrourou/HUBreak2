<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Eastern</title>
    <meta charset=utf8>
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

    .logo {
        width: 10%;
        height: 40px;
        right: 0;
        position: absolute;
    }


    .product {
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 20%;
        height: 30%;
        border-radius: 15px;
        background-color: rgb(241, 238, 238);
        margin: 70px 50px 0 0;
        font-size: 20px;
    }

    .food {
        width: 200px;
        height: 200px;
        object-fit: cover;
        border-radius: 15px;
        margin: 20px 20px 5px 20px;
    }

    .section {
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        margin-left: 12%;
    }

    h1,
    h2,
    h3 {
        text-align: center;
    }


    .cart-icon {
        display: inline-block;
        width: 18px;
        height: 18px;
        background-image: url("cart-icon.png");
        background-size: contain;
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

    .submit {
        margin-left: 47%;
        margin-bottom: 3%;
        background-color: #f18b05;
        width: 70px;
        border: 0;
        padding: 10px;
        color: white;
        border-radius: 10px;
    }

    .user-icon {
        display: inline-block;
        width: 18px;
        height: 18px;
        background-image: url("user.png");
        background-size: contain;
    }

    .product .button {
        display: block;
        width: 130px;
        padding: 12px;
        background: #f18b05;
        color: #fff;
        border: 0;
        border-radius: 5px;
        cursor: pointer;
    }

    .product .button:hover {
        background: #fda735;
    }

    .rating {
        position: absolute;
        top: 387%;
        left: 60%;
        width: 25%;
        height: 50%;
        padding: 20px;
        border-radius: 15px;
        background-color: rgb(241, 238, 238);
        text-align: center;
    }

    .rating .emo {
        position: absolute;
        font-family: FontAwesome;
        color: #f18b05;
        font-size: 90px;
        transform: translateX(-50%);
        margin-bottom: 20px;
        right: 87px;
    }

    .rating .emo:after {
        content: '\f119';
    }

    .rating div input {
        position: absolute;
        width: 25px;
        height: 50px;
        cursor: pointer;
        transform: translateX(52px);
        opacity: 0;
        z-index: 5;
    }

    .rating input:nth-of-type(4):checked~.emo:after,
    .rating input:nth-of-type(4):hover~.emo:after,
    .rating input:nth-of-type(3):checked~.emo:after,
    .rating input:nth-of-type(3):hover~.emo:after {
        content: '\f11a';
    }

    .rating input:nth-of-type(1):checked~.emo:after,
    .rating input:nth-of-type(1):hover~.emo:after,
    .rating input:nth-of-type(2):checked~.emo:after,
    .rating input:nth-of-type(2):hover~.emo:after {
        content: '\f118';
    }



    .rating input:checked~.star:after,
    .rating input:hover~.star:after {
        content: '\f005';
    }

    .rating .star {
        display: inline-block;
        font-family: FontAwesome;
        font-size: 42px;
        color: #FBB202;
        cursor: pointer;
        margin: 3px;
    }

    .rating .star:after {
        content: '\f006';
    }

    .rating .star:hover~.star:after,
    .rating .star:hover:after {
        content: '\f005';
    }

    .box {
        overflow: auto;
        text-align: right;
        font-size: 12px;
        margin-top: 5px;
        margin-right: 10px;
    }

    .rate {
        width: 25%;
        height: auto;
        border-radius: 15px;
        background-color: rgb(241, 238, 238);
        font-size: 18px;
        padding: 10px;
        margin: 30px 10px 10px 18%;
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

    .total-rate {
        margin-left: 18%;
        width: 25%;
        border-radius: 15px;
        background-color: rgb(241, 238, 238);
        font-size: 20px;
        margin-top: 20px;
        padding: 20px;
        text-align: center;
    }

    .sub {
        background-color: #f18b05;
        width: 70px;
        border: 0;
        color: white;
        border-radius: 10px;
        padding: 10px;
        margin-top: 2px;
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
            <li class="rest"><a href=" #">المطاعم</a>
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
        <h1>مطاعم الشرقي</h1>
        <h3>الموقع : في مجمع القاعات الشرقي</h3>
    </div>
    <div class="section">
        <?php
        if (!$database = mysqli_connect("localhost", "root", "12345678", "hubreak2_db"))
            die("Sorry, could not connect to the server.");
        extract($_POST);
        $query = "select products.*,resturantproducts.resturantId from products join resturantproducts on products.ID = productId WHERE resturantproducts.resturantId = 1  ";
        $result = mysqli_query($database, $query);
        while ($row = mysqli_fetch_row($result)) {
            print("<form class='product' method='post' action='addtocart.php'>");
            $x = 0;
            foreach ($row as $value) {
                if ($x == 0)
                    print("<img src='$value' class='food'></img>");
                elseif ($x == 1)
                    print("<input type='hidden' name='ID' value='$value'>");
                elseif ($x == 4)
                    print("<input type='hidden' name='restID' value='$value'>");
                else {
                    print("<span >$value</span>");
                }
                $x++;
            }
            print("<span class='count'><input type='number' style='margin-right: 10px;' name='quantity' min='1'
                                max='5' value='1'>: الكمية</span><br>
                        <input type='submit' class='button' value='أضف إلى السلة'></input><br>");
            print("</form>");
        }
        mysqli_close($database);
        ?>
    </div>
    <div class="total-rate">
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
        mysqli_query($database, $query);
        mysqli_close($database);
        ?>
    </div>
    <?php
    if (!$database = mysqli_connect("localhost", "root", "12345678", "hubreak2_db"))
        die("Sorry, could not connect to the server.");
    extract($_POST);
    $query = "select Name,rate,comment from rate,customers where customers.ID=rate.customerID and rate.rate >= 4 and  resturantID=1";
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
    <form action="submit_rating.php" method="post">
        <input type="hidden" name="RestID" value="1">
        <div class="rating">
            <span class="emo"> </span><br><br><br><br><br>
            <div>
                <input type="radio" name="rate" value="5"><span class="star"> </span>
                <input type="radio" name="rate" value="4"><span class="star"> </span>
                <input type="radio" name="rate" value="3"><span class="star"> </span>
                <input type="radio" name="rate" value="2"><span class="star"> </span>
                <input type="radio" name="rate" value="1"><span class="star"> </span>
            </div>
            <textarea rows="4" cols="35" name="desc" class="box" placeholder='...أكتب ملاحظتك هنا'></textarea><br>
            <input type="submit" value="إضافة تقييم" class="sub">
        </div>
        <br><br><br><br>
    </form>
    <footer>
        <p>Developed By</p>
        <p>HU Break Team &copy;</p>
    </footer>