<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Zaza - Add Meal</title>
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
        margin-bottom: 50px;
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

    .box {
        overflow: auto;
        text-align: right;
        font-size: 12px;
        margin-top: 5px;
        margin-right: 10px;
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

    .container {
        max-width: 400px;
        margin: 20px auto;
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
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        text-align: right;
    }

    .form-group input[type="submit"] {
        background-color: #f18b05;
        color: white;
        font-weight: bold;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
    }

    .button {
        font-size: large;
        font-weight: bold;
        border-radius: 5px;
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
        <h1>مطاعم ظاظا</h1>
        <h3>الموقع : بجانب مبنى مطاعم الجامعة</h3>
    </div>
    <div class="section">
    </div>
    <div class="container">
        <h2>إضافة وجبة</h2>
        <form action="insert_zaza.php" method="post">
            <div class="form-group">
                <label for="image">أرفق صورة الوجبة</label>
                <input type="file" name="meal_image" id="image" accept="image/*">
            </div>
            <p>
                <label>
                    <input type="text" placeholder="name" name="meal_name" required>
                </label>اسم الوجبة
            </p>
            <br>
            <p>
                <label>
                    <input type="text" placeholder="price" name="meal_price" required>
                </label>سعر الوجبة
            </p>
            <br>
            <div class="form-group">
                <input type="submit" value="إضافة" onclick="myFunction()">
                <label>
                    <input type="text" placeholder="name" name="meal_name" autocomplete="off" required>
                </label>اسم الوجبة
                </p>
                <br>
                <p>
                    <label>
                        <input type="text" placeholder="price" name="meal_price" autocomplete="off" required>
                    </label>سعر الوجبة
                </p>
                <br>
                <div class="form-group">
                    <input type="submit" class="button" value="إضافة">
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