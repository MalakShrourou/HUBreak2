<?php
error_reporting(0);
$msg = "";
if (isset($_POST['upload'])) {
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "./image/" . $filename;
    $db = mysqli_connect("localhost", "root", "12345678", "hubreak2_db");
    $sql = "UPDATE resturants SET filename='$filename' WHERE ID=1";
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
    <title>Eastern - Poster</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
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
    </style>
</head>

<body>
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
        $query = "select filename from resturants where ID=1";
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