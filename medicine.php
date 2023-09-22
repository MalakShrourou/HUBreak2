<!DOCTYPE html>
<html>

<head>
    <title>Medicine</title>
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
        margin-bottom: 100px;
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
        <h1>مطاعم الطب</h1>
        <h3>الموقع : في كلية الطب</h3>
    </div>
    <div class="section">
        <?php
        if (!$database = mysqli_connect("localhost", "root", "12345678", "hubreak2_db"))
            die("Sorry, could not connect to the server.");
        extract($_POST);
        $query = "select products.* from products join resturantproducts on products.ID = productId WHERE resturantproducts.resturantId = 3 ";
        $result = mysqli_query($database, $query);
        while ($row = mysqli_fetch_row($result)) {
            print("<form class='product' method='post' action='addtocart.php'>");
            $x = 0;
            foreach ($row as $value) {
                if ($x == 0)
                    print("<img src='$value' class='food'></img>");
                elseif ($x == 1)
                    print("<input type='hidden' name='ID' value='$value'>");
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
    <footer>
        <p>Developed By</p>
        <p>HU Break Team &copy;</p>
    </footer>