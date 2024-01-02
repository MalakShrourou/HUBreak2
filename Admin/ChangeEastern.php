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
    <title>Eastern - Change Price</title>
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

    .product .button {
        display: block;
        width: 130px;
        padding: 12px;
        background: #f18b05;
        color: #fff;
        font-size: large;
        font-weight: bold;
        border: 0;
        border-radius: 5px;
        cursor: pointer;
    }

    .product .button:hover {
        background: #fda735;
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
    <div class="intro">
        <h1>مطاعم الشرقي</h1>
        <h3>الموقع : في مجمع القاعات الشرقي</h3>
    </div>
    <div class="section">
        <?php
        if (!$database = mysqli_connect("localhost", "root", "12345678", "hubreak2_db"))
            die("Sorry, could not connect to the server.");
        extract($_POST);
        $query = "select products.ID,products.Image,products.name,resturantproducts.price,resturantproducts.resturantId from products join resturantproducts on products.ID = productId WHERE resturantproducts.resturantId = 1 ";
        $result = mysqli_query($database, $query);
        while ($row = mysqli_fetch_row($result)) {
            print("<form class='product' method='post' action='Update.php'>");
            $x = 0;
            foreach ($row as $value) {
                if ($x == 0) {
                    print("<input type='hidden' name='ID' value='$value'>");
                    $ID = $value;
                } elseif ($x == 1) {
                    if ($ID <= 20)
                        print("<img src='$value' class='food'></img>");
                    else
                        print("<img src='./image/$value' class='food'>");
                } elseif ($x == 3) {
                    print("<input type='hidden' name='price' value='$value'>");
                    print("<span >$value JD : السعر الحالي</span>");
                } elseif ($x == 4)
                    print("<input type='hidden' name='RestID' value='$value'>");
                else {
                    print("<span>$value</span>");
                }
                $x++;
            }
            print("<span class='count'><input type='text' name='new_price' size='5' autocomplete='off'> : السعر الجديد</span><br>
                        <input type='submit' class='button' value='تعديل السعر' onclick='myFunction()'></input><br>");
            print("</form>");
        }
        mysqli_close($database);
        ?>
    </div>
    <footer>
        <p>Developed By</p>
        <p>HU Break Team &copy;</p>
    </footer>

    <script>
    function myFunction() {
        alert("تم التعديل بنجاح!");
    }
    </script>

</body>

</html>