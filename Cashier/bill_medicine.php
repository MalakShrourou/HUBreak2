<?php
if (!$database = mysqli_connect("localhost", "root", "12345678"))
    die("Sorry, could not connect to the server.");
if (!mysqli_select_db($database, "hubreak2_db"))
    die("Sorry, could not find database.");
extract($_POST);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Invoice</title>
    <style>
    .result {
        color: red;
    }

    .notes {
        position: absolute;
        right: 0px;
    }

    td {
        text-align: center;
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
        margin-left: 48%;
        margin-top: 20px;
    }
    </style>
</head>

<body>
    <section class="mt-3">
        <div class="container-fluid">
            <h4 class="text-center" style="color:green"> HUBreak </h4>
            <h6 class="text-center">مطاعم الطب</h6>
            <div class="row" style="margin-right:370px;">
                <div class="col-md-5  mt-4 ">
                    <div role="alert" id="errorMsg" class="mt-5">
                    </div>
                </div>
                <div class="col-md-7  mt-4" style="background-color:#f5f5f5;">
                    <div class="p-4">
                        <div class="text-center">
                            <h4>فاتورة</h4>
                        </div>
                        <span class="mt-4">Time : </span><span class="mt-4" id="time"></span>
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6 ">
                                <span id="day"></span> : <span id="year"></span>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                                <?php
                                $q = "SELECT max(ID) from carts where ResturantID = 3 and CustomerID !=8";
                                $result = mysqli_query($database, $q);
                                $row = mysqli_fetch_row($result);
                                foreach ($row as $value) {
                                    $Rid = $value;
                                    print("<p>رقم الطلب : $value</p>");
                                }
                                ?>
                            </div>
                        </div>
                        <div class="row">
                            <table id="receipt_bill" class="table">
                                <thead>
                                    <tr>
                                        <th class="text-center">السعر</th>
                                        <th class="text-center">الكمية</th>
                                        <th class="text-center">الوجبة</th>
                                    </tr>
                                </thead>
                                <tbody id="new">
                                    <?php
                                    $query = "select orders.price,Quantity,products.Name from products join orders on products.ID = orders.ProductID where ResturantID =3 and frompos=0";
                                    $result = mysqli_query($database, $query);
                                    while ($row = mysqli_fetch_row($result)) {
                                        print("<tr>");
                                        foreach ($row as $value)
                                            print("<td>$value</td>");
                                        print("</tr>");
                                    }
                                    $query1 = "select totalprice from carts where ID = $Rid";
                                    $result = mysqli_query($database, $query1);
                                    $row = mysqli_fetch_row($result);
                                    if (mysqli_num_rows($result) > 0) {
                                        foreach ($row as $value) {
                                            print("<tr><td style='font-weight:bold;'>$value</td>");
                                            $total = $value;
                                        }
                                    }
                                    print("<td style='font-weight:bold;' colspan='2'>المبلغ الاجمالي</td></tr>");
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div style="margin-left:65%;">
                            <?php
                            $qq = "select Description from carts where ID = $Rid";
                            $result = mysqli_query($database, $qq);
                            while ($row = mysqli_fetch_row($result)) {
                                print("<tr><td class='notes'>الملاحظات : ");
                                foreach ($row as $value)
                                    print($value);
                            }
                            print("</td></tr>");
                            ?>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <form method="POST" action="medicine.php">
        <input type="submit" onclick="calc()" value="الدفع" class="button">
        <?php
        $query2 = "UPDATE orders SET Payed = 1 where resturantID = 3";
        $result = mysqli_query($database, $query2);
        $query2 = "UPDATE orders2 SET Payed = 1 where resturantID = 3";
        $result = mysqli_query($database, $query2);
        $q = "Delete from carts where ID = $Rid";
        $result = mysqli_query($database, $q);
        ?>
    </form>
</body>

</html>
<script>
$(document).ready(function() {
    $('#vegitable').change(function() {
        var id = $(this).find(':selected')[0].id;
        $.ajax({
            method: 'POST',
            url: 'fetch_product.php',
            data: {
                id: id
            },
            dataType: 'json',
            success: function(data) {
                $('#price').text(data.product_price);
            }
        });
    });
    var count = 1;
    $('#add').on('click', function() {
        var name = $('#vegitable').val();
        var qty = $('#qty').val();
        var price = $('#price').text();
        if (qty == 0) {
            var erroMsg =
                '<span class="alert alert-danger ml-5">Minimum Qty should be 1 or More than 1</span>';
            $('#errorMsg').html(erroMsg).fadeOut(9000);
        } else {
            billFunction();
        }

        function billFunction() {
            var total = 0;
            $("#receipt_bill").each(function() {
                var total = price * qty;
                var subTotal = 0;
                subTotal += parseInt(total);
                var table = '<tr><td>' + count + '</td><td>' + name + '</td><td>' + qty +
                    '</td><td>' + price +
                    '</td><td><strong><input type="hidden" id="total" value="' + total + '">' +
                    total + '</strong></td></tr>';
                $('#new').append(table)
                var total = 0;
                $('tbody tr td:last-child').each(function() {
                    var value = parseInt($('#total', this).val());
                    if (!isNaN(value)) {
                        total += value;
                    }
                });
                $('#subTotal').text(total);
                var Tax = (total * 5) / 100;
                $('#taxAmount').text(Tax.toFixed(2));
                var Subtotal = $('#subTotal').text();
                var taxAmount = $('#taxAmount').text();
                var totalPayment = parseFloat(Subtotal) + parseFloat(taxAmount);
                $('#totalPayment').text(totalPayment.toFixed(2));
            });
            count++;
        }
    });
    var currentdate = new Date();
    var datetime = currentdate.getDate() + "/" +
        (currentdate.getMonth() + 1) + "/" +
        currentdate.getFullYear();
    $('#year').text(datetime);

    // Code for extract Weekday     
    function myFunction() {
        var d = new Date();
        var weekday = new Array(7);
        weekday[0] = "Sunday";
        weekday[1] = "Monday";
        weekday[2] = "Tuesday";
        weekday[3] = "Wednesday";
        weekday[4] = "Thursday";
        weekday[5] = "Friday";
        weekday[6] = "Saturday";
        var day = weekday[d.getDay()];
        return day;
    }
    var day = myFunction();
    $('#day').text(day);
});
window.onload = displayClock();

function displayClock() {
    var time = new Date().toLocaleTimeString();
    document.getElementById("time").innerHTML = time;
    setTimeout(displayClock, 1000);
}

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