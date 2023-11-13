<?php
session_start();
?>
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
        text-align: center;
    }

    body {
        color: rgb(124, 17, 17);
        background-attachment: fixed;
    }

    .main {
        display: flex;
        flex-direction: row;
    }

    .product {
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 30%;
        border-radius: 15px;
        background-color: rgb(241, 238, 238);
        margin: 50px 0 0 10px;
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
        margin-left: 2%;
        width: 70%;
        margin-bottom: 50px;
        margin-right: 0;
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
        border: 0;
        border-radius: 5px;
        cursor: pointer;
    }

    .product .button:hover {
        background: #fda735;
    }

    .calculate {
        margin-top: 50px;
        border-radius: 15px;
        background-color: rgb(241, 238, 238);
        width: 30%;
        padding: 20px;
        height: 50%;
        margin-right: 2%;
    }

    .table {
        font-size: 25px;
        color: rgb(124, 17, 17);
        width: 100%;
    }

    .table td {
        text-align: center;
    }

    tr {
        height: 50px;
    }

    thead,
    tfoot {
        height: 30px;
    }

    .desc {
        overflow: auto;
        text-align: right;
        font-size: 30px;
    }

    .box {
        overflow: auto;
        text-align: right;
        font-size: 20px;
    }

    .subbutton {
        display: block;
        padding: 12px;
        background: #f18b05;
        color: #fff;
        font-size: large;
        font-weight: bold;
        border: 0;
        border-radius: 5px;
        cursor: pointer;
        margin-left: 38%;
    }

    .subbutton:hover {
        background: #fda735;
    }

    .button {
        cursor: pointer;
        padding: 6px;
        width: 50%;
        background: red;
        color: white;
        border: 0;
        border-radius: 5px;
    }
    </style>
</head>

<body>
    <div class="main">
        <div class="section">
            <?php
            if (!$database = mysqli_connect("localhost", "root", "12345678", "hubreak2_db"))
                die("Sorry, could not connect to the server.");
            extract($_POST);
            $query = "select products.*,resturantproducts.price,resturantproducts.resturantId from products join resturantproducts on products.ID = productId WHERE resturantproducts.resturantId = 3 ";
            $result = mysqli_query($database, $query);
            while ($row = mysqli_fetch_row($result)) {
                print("<form class='product' method='post' action='addtocart.php'>");
                $x = 0;
                foreach ($row as $value) {
                    if ($x == 0)
                        print("<img src='$value' class='food'></img>");
                    elseif ($x == 1)
                        print("<input type='hidden' name='ID' value='$value'>");
                    elseif ($x == 3) {
                        print("<input type='hidden' name='price' value='$value'>");
                        print("<span >$value</span>");
                    } elseif ($x == 4)
                        print("<input type='hidden' name='restID' value='$value'>");
                    else {
                        print("<span >$value</span>");
                    }
                    $x++;
                }
                print("<span class='count'><input type='number' style='margin-right: 10px;' name='quantity' min='1'
                                max='5' value='1'>: الكمية</span><br>
                        <input type='submit' class='button' value='أضف إلى السلة' onclick='myFunction()'></input><br>");
                print("</form>");
            }
            mysqli_close($database);
            ?>
        </div>
        <div class="calculate">
            <form method='post' action='placeorder.php'>
                <?php
                if (!$database = mysqli_connect("localhost", "root", "12345678", "hubreak2_db"))
                    die("Sorry, could not connect to the server.");
                extract($_POST);
                $query = "select orders.ID,price,Quantity,name from Orders,products where orders.productId=products.ID ";
                $result = mysqli_query($database, $query);
                print("<table class='table'>");
                print("<thead>");
                print("<th style='width: 20px;'>حذف</th>");
                print("<th style='width: 70px;'>السعر</th>");
                print("<th style='width: 70px;'>الكمية</th>");
                print("<th>المنتج</th>");
                print("</thead>");
                $total = 0;
                while ($row = mysqli_fetch_row($result)) {
                    print("<tr>");
                    print("<form method='get' action='deletecart.php'>");
                    print("<td><input type='submit' class='button' value='X'></td>");
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
                print("<tfoot style='margin-top:30px;'>");
                print("<th></th>");
                print("<th>$total</th>");
                print("<th colspan='2'>المبلغ الاجمالي</th>");
                print("</tfoot>");
                print("</table><br>");
                print("<label class='desc'> :أضف ملاحظة<br><textarea rows='6' cols='30' name='desc' class='box' placeholder='...أكتب ملاحظتك هنا'></textarea></label>");
                mysqli_close($database);
                ?>
                <input type="submit" value="تأكيد الطلب" class="subbutton">
            </form>
        </div>
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