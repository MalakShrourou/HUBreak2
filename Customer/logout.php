<?php
session_start();
?>
<html>

<head>
    <title>Logout</title>
    <style>
    body {
        background-color: #f18b05;
        font-family: 'Times New Roman', Times, serif;
        color: white;
    }

    h1 {
        text-align: center;
        margin-top: 25%;
    }
    </style>
</head>

<body>
    <h1>...جاري تسجيل الخروج</h1>
</body>
<?php
session_unset();
session_destroy();
header("Refresh: 2; url=Login.php");
?>

</html>