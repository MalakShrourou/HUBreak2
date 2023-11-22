<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Medicine - Add</title>
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

    .user-icon {
        display: inline-block;
        width: 18px;
        height: 18px;
        background-image: url("user.png");
        background-size: contain;
    }

    .container {
        max-width: 400px;
        margin: 30px auto;
        padding: 20px;
        border: 1px solid #ccc;
        background-color: #f9f9f9;
        text-align: right;
    }

    .form-group {
        margin-bottom: 15px;
        text-align: center;
    }

    .form-group label {
        display: block;
        margin-bottom: 5px;
        text-align: right;
    }

    .form-group input[type="file"],
    .form-group textarea {
        width: 70%;
        padding: 10px;
        margin-bottom: 10px;
        text-align: left;
    }

    .form-group input[type="submit"] {
        background-color: #f18b05;
        border: #f18b05;
        color: white;
        font-weight: bold;
        padding: 10px 20px;
        cursor: pointer;
        border-radius: 15px;
        width: 20%;
    }

    input[type="text"] {
        margin-right: 30%;
        width: 50%;
        text-align: right;
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
    <div class="container">
        <h2>إضافة وجبة</h2>
        <form action="Add.php" method="post">
            <input type="hidden" name="RestID" value="3">
            <div class="form-group">
                <label>
                    <input type="file" name="meal_image" id="image" accept="image/*" required>أرفق صورة الوجبة
                </label>
                <p>
                    <label>
                        <input type="text" placeholder="الاسم" name="meal_name" required autocomplete="off">اسم الوجبة
                    </label>
                </p>
                <br>
                <p>
                    <label>
                        <input type="text" placeholder="السعر" name="meal_price" required autocomplete="off"
                            style="margin-right:28.5%;">سعر الوجبة
                    </label>
                </p>
                <br>
                <input type="submit" value="إضافة" onclick="myFunction()">
            </div>
        </form>
    </div>
    <footer>
        <p>Developed By</p>
        <p>HU Break Team &copy;</p>
    </footer>

    <script>
    function myFunction() {
        alert("تمت الإضافة بنجاح!");
    }
    </script>

</body>

</html>