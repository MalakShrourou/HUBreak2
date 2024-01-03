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
    <title>Medicine</title>
    <meta charset="UTF-8">
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

    .section {
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        margin-left: 2%;
        width: 70%;
        margin-bottom: 30px;
    }

    footer {
        background: #f18b05;
        color: white;
        text-align: center;
        padding: 10px;
        margin-top: 9%;
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

    .product {
        max-width: 200px;
        min-width: 200px;
        height: auto;
        padding: 10px;
        color: rgb(124, 17, 17);
        border-radius: 5px;
        background-color: rgb(241, 238, 238);
        border: 2px solid rgb(241, 238, 238);
        cursor: pointer;
        font-size: 20px;
        margin: 20px 5px 12px 10px;
        text-align: center;
    }

    .calculate {
        margin-top: 20px;
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
        display: block;
        padding: 12px;
        background: #f18b05;
        color: #fff;
        font-size: large;
        font-weight: bold;
        border: 0;
        border-radius: 5px;
        cursor: pointer;
    }

    .buttond {
        cursor: pointer;
        padding: 6px;
        width: 50%;
        background: red;
        color: white;
        border: 0;
        border-radius: 5px;
    }

    .inv {
        border-radius: 15px;
        background-color: rgb(241, 238, 238);
        width: 30%;
        font-size: large;
        padding: 10px;
        margin-left: 70%;
        margin-right: 2%;
    }

    a {
        text-decoration: none;
        color: rgb(124, 17, 17);
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
            $query = "select products.ID,products.name,resturantproducts.price,resturantproducts.resturantId from products join resturantproducts on products.ID = productId WHERE resturantproducts.resturantId = 3 ";
            $result = mysqli_query($database, $query);
            while ($row = mysqli_fetch_row($result)) {
                print("<form method='post' action='addtocart.php'>");
                print("<input type='hidden' name='link' value='Medicine.php'>");
                $x = 0;
                foreach ($row as $value) {
                    if ($x == 0)
                        print("<input type='hidden' name='ID' value='$value'>");
                    elseif ($x == 1)
                        print("<input type='submit' class='product' value='$value'>");
                    elseif ($x == 2)
                        print("<input type='hidden' name='price' value='$value'>");
                    elseif ($x == 3)
                        print("<input type='hidden' name='restID' value='$value'>");
                    $x++;
                }
                print("</form>");
            }
            mysqli_close($database);
            ?>
        </div>
        <div class="calculate">
            <?php
            if (!$database = mysqli_connect("localhost", "root", "12345678", "hubreak2_db"))
                die("Sorry, could not connect to the server.");
            extract($_POST);
            $query = "select orders.ID,price,name from Orders,products where orders.productId=products.ID and resturantID=3 and frompos=1 and payed=0";
            $result = mysqli_query($database, $query);
            print("<table class='table'>");
            print("<thead>");
            print("<th style='width: 20px;'>حذف</th>");
            print("<th style='width: 70px;'>السعر</th>");
            print("<th>المنتج</th>");
            print("</thead>");
            $total = 0;
            while ($row = mysqli_fetch_row($result)) {
                print("<tr>");
                print("<form method='post' action='deletecart.php'>");
                print("<input type='hidden' name='link' value='Medicine.php'>");
                print("<td><input type='submit' class='buttond' value='X'></td>");
                $x = 0;
                foreach ($row as $value) {
                    if ($x == 0)
                        print("<input type='hidden' name='Id' value='$value'>");
                    else
                        print("<td>$value</td>");
                    $x++;
                }
                print("</form>");
                $total = $total + $row[1];
                print("</tr>");
            }
            print("<tfoot style='margin-top:30px;'>");
            print("<th></th>");
            print(" <form method='POST' action='placeorder.php'>");
            print("<th>$total</th>");
            print("<th colspan='2'>المبلغ الاجمالي</th>");
            print("</tfoot>");
            print("</table><br>");
            print("<label class='desc'> : أضف ملاحظة<br><textarea rows='5' cols='25' id='dd' name='desc' class='box' placeholder='...أكتب ملاحظتك هنا'></textarea></label>");
            ?>
            <input type="hidden" name="RestId" value=3>
            <input type="hidden" name="t" value=<?php echo $total; ?>>
            <input type="submit" value="تأكيد الطلب" class="subbutton" onclick="calc()">
            </form>
        </div>
    </div>
    <div class="inv">
        <?php
        $qq2 = "select ID from carts where resturantId=3 and customerID != 8";
        $result = mysqli_query($database, $qq2);
        while ($row = mysqli_fetch_row($result)) {
            foreach ($row as $value) {
                $Rid = $value;
                print("<a href='bill_medicine.php'>رقم الطلب : $value</a><br><br>");
            }
        }
        ?>
    </div>

    <footer>
        <p>Developed By</p>
        <p>HU Break Team &copy;</p>
    </footer>

    <script>
    function calc() {
        var m = prompt("أدخل المبلغ المدفوع لمعرفة المبلغ المتبقي");
        while (m < <?php echo $total; ?>) {
            alert("invalid amount");
            m = prompt("أدخل المبلغ المدفوع لمعرفة المبلغ المتبقي");
        }
        var t = m - <?php echo $total; ?>;
        alert("المبلغ المتبقي = " + t);
    }
    </script>

</body>

</html>