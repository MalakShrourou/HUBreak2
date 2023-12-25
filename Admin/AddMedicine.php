<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: login.php');
    exit();
}
if (!$database = mysqli_connect("localhost", "root", "12345678", "hubreak2_db"))
    die("Sorry, could not connect to the server.");
extract($_POST);
error_reporting(0);
$msg = "";
if (isset($_POST['upload'])) {
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "./image/" . $filename;
    $sql = "INSERT INTO products (Image, Name, Time) VALUES ('$filename','$meal_name','$meal_time')";
    mysqli_query($database, $sql);
    $sql2 = "insert into resturantproducts values ((SELECT MAX(ID) FROM products),'$RestID','$meal_price')";
    mysqli_query($database, $sql2);
    if (move_uploaded_file($tempname, $folder)) {
        echo "
        <script>
            alert('تمت الإضافة بنجاح!');
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Failed to upload image!');
        </script>
        ";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Medicine - Add</title>
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
        <h1>مطاعم الطب</h1>
        <h3>الموقع : في كلية الطب</h3>
    </div>
    <div class="container">
        <h2>إضافة وجبة</h2>
        <form enctype="multipart/form-data" method="post">
            <input type="hidden" name="RestID" value="3">
            <div class="form-group">
                <label>
                    <input type="file" name="uploadfile" accept="image/*" required>أرفق صورة الوجبة
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
                <p>
                    <label>
                        <input type="number" placeholder="الوقت" name="meal_time" required autocomplete="off"
                            style="margin-right:27%; text-align:right;" min=0 max=30>وقت اللإعداد
                    </label>
                </p>
                <br>
                <input type="submit" value="إضافة">
            </div>
        </form>
    </div>
    <footer>
        <p>Developed By</p>
        <p>HU Break Team &copy;</p>
    </footer>

</body>

</html>