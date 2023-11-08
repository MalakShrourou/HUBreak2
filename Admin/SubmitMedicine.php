<?php
error_reporting(0);
$msg = "";
if (isset($_POST['upload'])) {
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "./image/" . $filename;
    $database = mysqli_connect("localhost", "root", "12345678", "hubreak2_db");
    $query = "UPDATE resturants SET Poster='$filename' WHERE ID=3";
    mysqli_query($database, $query);
    if (move_uploaded_file($tempname, $folder)) {
        echo "<script>
        alert('Image uploaded successfully!');
        </script> ";
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        #content {
            background: rgba(0, 0, 0, 0.582);
            width: 50%;
            justify-content: center;
            align-items: center;
            margin: 20px auto;
            padding: 50px;
            border: 1px solid #cbcbcb00;
            border-radius: 15px;
        }

        form {
            width: 50%;
            margin: 20px auto;
        }

        img {
            margin: 5px;
            width: 350px;
            height: 250px;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            min-height: 100vh;
            background-color: rgb(255, 102, 0);
            background-image: url('cover.jpg');
            background-size: cover;
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
                <button class="btn btn-primary" style="background-color:orange;border-color:orange;" type="submit"
                    name="upload">UPLOAD</button>
            </div>
        </form>
    </div>
    <div>
        <?php
        $database = mysqli_connect("localhost", "root", "12345678", "hubreak2_db");
        $query = "select Poster from resturants where ID=3";
        $result = mysqli_query($database, $query);
        while ($data = mysqli_fetch_assoc($result)) {
            ?>
            <img src="./image/<?php echo $data['filename']; ?>" alt="Medicine Poster">
            <?php
        }
        mysqli_close($database);
        ?>
    </div>
</body>

</html>