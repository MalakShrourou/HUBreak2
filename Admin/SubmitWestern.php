<?php
error_reporting(0);
$msg = "";
if (isset($_POST['upload'])) {
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "./image/" . $filename;
    $db = mysqli_connect("localhost", "root", "12345678", "hubreak2_db");
    $sql = "UPDATE resturants SET filename='$filename' WHERE ID=6";
    mysqli_query($db, $sql);
    if (move_uploaded_file($tempname, $folder)) {
        echo "<script>
        alert('Image uploaded successfully!');
        </script>";
    } else {
        echo "<script>
        alert('Failed to upload image!');
        </script>";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Western - Poster</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Times New Roman', Times, serif;
    }

    body {
        background-image: url('cover.jpg');
        background-color: #f18b05;
    }

    #content {
        background: rgba(0, 0, 0, 0.582);
        width: 50%;
        justify-content: center;
        align-items: center;
        margin: 200px auto 50px;
        padding: 50px;
        border: 1px solid #cbcbcb00;
        border-radius: 15px;
    }

    form {
        width: 50%;
        margin: 20px auto;
    }

    #display-image img {
        width: 40%;
        margin-left: 30%;
        margin-bottom: 50px;
    }

    .upload {
        background-color: #f18b05;
        border: #f18b05;
        color: white;
        padding: 10px 20px;
        cursor: pointer;
        border-radius: 15px;
        width: 30%;
        margin-left: 30%;
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
    <div id="content">
        <form method="POST" action="" enctype="multipart/form-data">
            <div class="form-group">
                <input class="form-control" type="file" name="uploadfile" value="">
            </div>
            <div class="form-group">
                <button class="upload" type="submit" name="upload">تحميل</button>
            </div>
        </form>
    </div>
    <div id="display-image">
        <?php
        $query = "select filename from resturants where ID=6";
        $result = mysqli_query($db, $query);
        while ($data = mysqli_fetch_assoc($result)) {
            ?>
        <img src="./image/<?php echo $data['filename']; ?>">
        <?php
        }
        ?>
    </div>
</body>

</html>