<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: login.php');
    exit();
}
?>
<!Doctype html>
<html>

<head>
    <title>Cart</title>
    <meta charset="UTF-8">
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
            background-color: white;
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

        .table {
            font-size: 18px;
            width: 100%;
            color: rgb(124, 17, 17);
            height: auto;
        }

        .table td {
            text-align: center;
        }

        tr {
            height: 30px;
        }

        thead,
        tfoot {
            height: 30px;
        }

        footer {
            background: #f18b05;
            color: white;
            text-align: center;
            padding: 10px;
            position: relative;
            left: 0;
            bottom: 0;
            width: 100%;
        }

        a .cart-icon {
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

        .intro {
            background-color: #fda025;
            width: 100%;
            color: white;
            padding: 2% 0;
            font-size: xx-large;
            text-align: center;
        }

        .button {
            cursor: pointer;
            padding: 6px;
            width: 40%;
            background: red;
            color: white;
            border: 0;
            border-radius: 5px;
        }

        .subbutton {
            display: block;
            width: 150px;
            padding: 12px;
            background: #f18b05;
            color: #fff;
            border: 0;
            border-radius: 5px;
            cursor: pointer;
            font-size: x-large;
            margin: 3% auto 3% 45%;
        }

        .subbutton:hover {
            background: #fda735;
        }

        .desc {
            margin: 0px 100px 20px 77%;
            overflow: auto;
            text-align: right;
            font-size: 16px;
            color: rgb(124, 17, 17);
        }

        .box {
            overflow: auto;
            text-align: right;
            margin-left: 57%;
        }

        .section {
            width: 40%;
            color: white;
            font-size: 28px;
            background-color: rgb(241, 238, 238);
            height: auto;
            margin: 30px 75px 30px 20px;
        }

        h4 {
            background-color: #f18b05;
            text-align: center;
            padding: 5px;
            width: 50%;
            margin-left: 110px;
        }

        .center {
            display: flex;
            flex-direction: row-reverse;
            flex-wrap: wrap;
        }

        .empty {
            color: #f18b05;
            font-size: 40px;
            font-weight: bold;
            text-align: center;
            margin: 3% auto 3% 45%;
        }
    </style>
    <script>
        function submitForm() {
            event.preventDefault(); // Prevent default behavior
            document.getElementById("del").submit(); // Submit the inner form
        }
    </script>
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
        <h1>سلة المشتريات</h1>
    </div>
    <form method='post' action='placeorder.php'>
        <div class="center">
            <?php
            if (!$database = mysqli_connect("localhost", "root", "12345678", "hubreak2_db"))
                die("Sorry, could not connect to the server.");
            extract($_POST);
            $query = "SELECT DISTINCT resturantID FROM Orders where frompos=0 and payed=0";
            $result = mysqli_query($database, $query);
            $q = "SELECT * FROM orders where frompos=0 and payed=0";
            $check = mysqli_query($database, $q);
            if ($check->num_rows > 0) {
                while ($row = mysqli_fetch_row($result)) {
                    foreach ($row as $value) {
                        if ($value == 1) {
                            print("<div class='section'><h4>مطاعم الشرقي</h4>");
                            $query1 = "select orders.ID,price,Quantity,name from Orders,products where orders.productId=products.ID and resturantID=1 and frompos=0 and payed=0 ";
                            $result1 = mysqli_query($database, $query1);
                            print("<table class='table'>");
                            print("<thead>");
                            print("<th>حذف</th>");
                            print("<th>السعر</th>");
                            print("<th>الكمية</th>");
                            print("<th>المنتج</th>");
                            print("</thead>");
                            $total = 0;
                            while ($row = mysqli_fetch_row($result1)) {
                                print("<tr>");
                                print("<form method='post'>");
                                print("<td><input formaction='deletecart.php' type='submit' class='button' value='X'></td>");
                                $x = 0;
                                foreach ($row as $value) {
                                    if ($x == 0)
                                        print("<input type='hidden' name='Id' value='$value'>");
                                    else
                                        print("<td>$value</td>");
                                    $x++;
                                }
                                print("</form>");
                                $total = $total + $row[2] * $row[1];
                                print("</tr>");
                            }
                            print("<tfoot>");
                            print("<th></th>");
                            print("<th>$total JD</th>");
                            print("<th colspan='2'>المبلغ الاجمالي</th>");
                            print("</tfoot>");
                            print("</table>");
                            print("<input type='hidden' name='total1' value='$total'>");
                            print("<label class='desc'> : أضف ملاحظة<br><textarea rows='5' cols='25' name='desc1' class='box' placeholder='...أكتب ملاحظتك هنا'></textarea></label></div>");
                        } elseif ($value == 2) {
                            print("<div class='section'><h4>مطاعم اسبريسو</h4>");
                            $query2 = "select orders.ID,price,Quantity,name from Orders,products where orders.productId=products.ID and resturantID=2 and frompos=0 and payed=0 ";
                            $result2 = mysqli_query($database, $query2);
                            print("<table class='table'>");
                            print("<thead>");
                            print("<th>حذف</th>");
                            print("<th>السعر</th>");
                            print("<th>الكمية</th>");
                            print("<th>المنتج</th>");
                            print("</thead>");
                            $total = 0;
                            while ($row = mysqli_fetch_row($result2)) {
                                print("<tr>");
                                print("<form method='post'>");
                                print("<td><input formaction='deletecart.php' type='submit' class='button' value='X'></td>");
                                $x = 0;
                                foreach ($row as $value) {
                                    if ($x == 0)
                                        print("<input type='hidden' name='Id' value='$value'>");
                                    else
                                        print("<td>$value</td>");
                                    $x++;
                                }
                                print("</form>");
                                $total = $total + $row[2] * $row[1];
                                print("</tr>");
                            }
                            print("<tfoot>");
                            print("<th></th>");
                            print("<th>$total JD</th>");
                            print("<th colspan='2'>المبلغ الاجمالي</th>");
                            print("</tfoot>");
                            print("</table>");
                            print("<input type='hidden' name='total2' value='$total'>");
                            print("<label class='desc'> : أضف ملاحظة<br><textarea rows='5' cols='25' name='desc2' class='box' placeholder='...أكتب ملاحظتك هنا'></textarea></label></div>");
                        } elseif ($value == 3) {
                            print("<div class='section'><h4>مطاعم الطب</h4>");
                            $query3 = "select orders.ID,price,Quantity,name from Orders,products where orders.productId=products.ID and resturantID=3 and frompos=0 and payed=0";
                            $result3 = mysqli_query($database, $query3);
                            print("<table class='table'>");
                            print("<thead>");
                            print("<th>حذف</th>");
                            print("<th>السعر</th>");
                            print("<th>الكمية</th>");
                            print("<th>المنتج</th>");
                            print("</thead>");
                            $total = 0;
                            while ($row = mysqli_fetch_row($result3)) {
                                print("<tr>");
                                print("<form method='post'>");
                                print("<td><input  formaction='deletecart.php' type='submit' class='button' value='X'></td>");
                                $x = 0;
                                foreach ($row as $value) {
                                    if ($x == 0)
                                        print("<input type='hidden' name='Id' value='$value'>");
                                    else
                                        print("<td>$value</td>");
                                    $x++;
                                }
                                print("</form>");
                                $total = $total + $row[2] * $row[1];
                                print("</tr>");
                            }
                            print("<tfoot>");
                            print("<th></th>");
                            print("<th>$total JD</th>");
                            print("<th colspan='2'>المبلغ الاجمالي</th>");
                            print("</tfoot>");
                            print("</table>");
                            print("<input type='hidden' name='total3' value='$total'>");
                            print("<label class='desc'> : أضف ملاحظة<br><textarea rows='5' cols='25' name='desc3' class='box' placeholder='...أكتب ملاحظتك هنا'></textarea></label></div>");
                        } elseif ($value == 4) {
                            print("<div class='section'><h4>مطاعم القرية الطلابية</h4>");
                            $query4 = "select orders.ID,price,Quantity,name from Orders,products where orders.productId=products.ID and resturantID=4 and frompos=0 and payed=0";
                            $result4 = mysqli_query($database, $query4);
                            print("<table class='table'>");
                            print("<thead>");
                            print("<th>حذف</th>");
                            print("<th>السعر</th>");
                            print("<th>الكمية</th>");
                            print("<th>المنتج</th>");
                            print("</thead>");
                            $total = 0;
                            while ($row = mysqli_fetch_row($result4)) {
                                print("<tr>");
                                print("<form method='post'>");
                                print("<td><input formaction='deletecart.php' type='submit' class='button' value='X'></td>");
                                $x = 0;
                                foreach ($row as $value) {
                                    if ($x == 0)
                                        print("<input type='hidden' name='Id' value='$value'>");
                                    else
                                        print("<td>$value</td>");
                                    $x++;
                                }
                                print("</form>");
                                $total = $total + $row[2] * $row[1];
                                print("</tr>");
                            }
                            print("<tfoot>");
                            print("<th></th>");
                            print("<th>$total JD</th>");
                            print("<th colspan='2'>المبلغ الاجمالي</th>");
                            print("</tfoot>");
                            print("</table>");
                            print("<input type='hidden' name='total4' value='$total'>");
                            print("<label class='desc'> : أضف ملاحظة<br><textarea rows='5' cols='25' name='desc4' class='box' placeholder='...أكتب ملاحظتك هنا'></textarea></label></div>");
                        } elseif ($value == 5) {
                            print("<div class='section'><h4>مطاعم ظاظا</h4>");
                            $query5 = "select orders.ID,price,Quantity,name from Orders,products where orders.productId=products.ID and resturantID=5 and frompos=0 and payed=0";
                            $result5 = mysqli_query($database, $query5);
                            print("<table class='table'>");
                            print("<thead>");
                            print("<th>حذف</th>");
                            print("<th>السعر</th>");
                            print("<th>الكمية</th>");
                            print("<th>المنتج</th>");
                            print("</thead>");
                            $total = 0;
                            while ($row = mysqli_fetch_row($result5)) {
                                print("<tr>");
                                print("<form method='post'>");
                                print("<td><input formaction='deletecart.php' type='submit' class='button' value='X'></td>");
                                $x = 0;
                                foreach ($row as $value) {
                                    if ($x == 0)
                                        print("<input type='hidden' name='Id' value='$value'>");
                                    else
                                        print("<td>$value</td>");
                                    $x++;
                                }
                                print("</form>");
                                $total = $total + $row[2] * $row[1];
                                print("</tr>");
                            }
                            print("<tfoot>");
                            print("<th></th>");
                            print("<th>$total JD</th>");
                            print("<th colspan='2'>المبلغ الاجمالي</th>");
                            print("</tfoot>");
                            print("</table>");
                            print("<input type='hidden' name='total5' value='$total'>");
                            print("<label class='desc'> : أضف ملاحظة<br><textarea rows='5' cols='25' name='desc5' class='box' placeholder='...أكتب ملاحظتك هنا'></textarea></label></div>");
                        } elseif ($value == 6) {
                            print("<div class='section'><h4>مطاعم الغربي</h4>");
                            $query6 = "select orders.ID,price,Quantity,name from Orders,products where orders.productId=products.ID and resturantID=6 and frompos=0 and payed=0";
                            $result6 = mysqli_query($database, $query6);
                            print("<table class='table'>");
                            print("<thead>");
                            print("<th>حذف</th>");
                            print("<th>السعر</th>");
                            print("<th>الكمية</th>");
                            print("<th>المنتج</th>");
                            print("</thead>");
                            $total = 0;
                            while ($row = mysqli_fetch_row($result6)) {
                                print("<tr>");
                                print("<form method='post'>");
                                print("<td><input type='submit' class='button' value='X' formaction='deletecart.php'></td>");
                                $x = 0;
                                foreach ($row as $value) {
                                    if ($x == 0)
                                        print("<input type='hidden' name='Id' value='$value'>");
                                    else
                                        print("<td>$value</td>");
                                    $x++;
                                }
                                print("</form>");
                                $total = $total + $row[2] * $row[1];
                                print("</tr>");
                            }
                            print("<tfoot>");
                            print("<th></th>");
                            print("<th>$total JD</th>");
                            print("<th colspan='2'>المبلغ الاجمالي</th>");
                            print("</tfoot>");
                            print("</table>");
                            print("<input type='hidden' name='total6' value='$total'>");
                            print("<label class='desc'> : أضف ملاحظة<br><textarea rows='5' cols='25' name='desc6' class='box' placeholder='...أكتب ملاحظتك هنا'></textarea></label></div>");
                        }
                    }
                }
                print("</div>");
                print("<input type='submit' value='تأكيد الطلب' class='subbutton' formtarget='_blank'>");
                mysqli_close($database);
                print("</form>");
                print("<footer>");
                print("<p>Developed By</p>");
                print("<p>HU Break Team &copy;</p>");
                print("</footer>");
            } else {
                print("<p class = 'empty'>السلة فارغة</p>");
                print("</form>");
                print("<footer style = 'position: absolute;'>");
                print("<p>Developed By</p>");
                print("<p>HU Break Team &copy;</p>");
                print("</footer>");
            }
            ?>
</body>

</html>