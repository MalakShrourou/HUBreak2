<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: login.php');
    exit();
}

if (!$database = mysqli_connect("localhost", "root", "12345678"))
    die("Sorry, could not connect to the server.");
if (!mysqli_select_db($database, "hubreak2_db"))
    die("Sorry, could not find database.");
extract($_POST);
$error = "";
$success = "";
if (isset($submit)) {
    $query1 = "SELECT * from customers where Email = '$email'";
    if (!$result = mysqli_query($database, $query1))
        die("wrong query");
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        if ($currentpass == $row['Password'])
            if (preg_match('/^([0-9A-Za-z_$]{8,})$/', $newpass))
                if ($newpass != $currentpass)
                    if ($newpass == $confirmnewpass) {
                        $query2 = "UPDATE customers SET Password = '$newpass' WHERE Email = '$email' AND Password = '$currentpass'";
                        $success = "Password Changed";
                        mysqli_query($database, $query2);}
                    else
                        $error = "Dismatch";
                else
                    $error = "Please Enter a New Password";
            else
                $error = "Password Must Contain at Least 8 Digits";
        else
            $error = "Wrong Password";
    }
    else
        $error = "Email Not Found";
}
mysqli_close($database);
?>

<!DOCTYPE html>
<html>
    <title>Change Password</title>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <style>
    @import url(https://fonts.googleapis.com/css?family=Roboto:300);

    * {
        font-family: 'Times New Roman', Times, serif;
    }

    .login-page {
        width: 460px;
        padding: 10px;
        margin: 5% auto 0 30%;
    }

    .form {
        position: relative;
        background: #FFFFFF;
        max-width: 360px;
        padding: 45px;
        text-align: center;
        box-shadow: -30px 30px 20px rgba(0, 0, 0, 0.3);
        margin-top: -10px;
        border-radius: 30px;
    }

    .form input {
        background: #f2f2f2;
        width: 90%;
        border: 0;
        margin: 0 0 15px;
        padding: 15px;
        box-sizing: border-box;
        font-size: 14px;
        border-radius: 30px;
    }

    .form button {
        background: orange;
        width: 50%;
        border: 0;
        padding: 15px;
        color: #FFFFFF;
        font-size: 14px;
        -webkit-transition: all 0.3 ease;
        transition: all 0.3 ease;
        cursor: pointer;
        border-radius: 30px;
    }


    .form button:hover,
    .form button:active,
    .form button:focus {
        background: #b88715;
    }

    .form .message {
        margin: 15px 0 0;
        color: #b3b3b3;
        font-size: 16px;
    }

    .form .message a {
        color: orange;
        text-decoration: none;
    }

    .form .register-form {
        display: none;
    }

    .container {
        position: relative;
        z-index: 1;
        max-width: 300px;
        margin: 0 auto;
    }

    .container:before,
    .container:after {
        content: "";
        display: block;
        clear: both;
    }

    .container .info {
        margin: 50px auto;
        text-align: center;
    }

    .container .info h1 {
        margin: 0 0 15px;
        padding: 0;
        font-size: 36px;
        font-weight: 300;
        color: #1a1a1a;
    }

    .container .info span {
        color: #4d4d4d;
        font-size: 12px;
    }

    .container .info span a {
        color: #000000;
        text-decoration: none;
    }

    .container .info span .fa {
        color: #EF3B3A;
    }

    body {
        background-image: url("cover.jpg");
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }

    h2 {
        color: orange;
    }

    .error {
        color: red;
        text-align: center;
        font-weight: bold;
    }

    .success {
        color: lawngreen;
        text-align: center;
        font-weight: bold;
    }
    </style>
</head>

<body>
    <div class="login-page">
        <div class="form">
            <h2>Change Password</h2>
            <form class="login-form" method="POST" autocomplete="off">
                <input type="email" name="email" placeholder="Email" />
                <input type="password" name="currentpass" placeholder="Current Password" spellcheck="false"
                    style="margin-left: -10px; " required id="id_password" />
                <i class="far fa-eye" id="togglePassword" style="margin-left: -35px; cursor: pointer;"></i>
                <input type="password" name="newpass" placeholder="New Password" spellcheck="false"
                    style="margin-left: -10px; " required id="id_password" />
                <i class="far fa-eye" id="togglePassword" style="margin-left: -35px; cursor: pointer;"></i>
                <input type="password" name="confirmnewpass" placeholder="Confirm New Password" spellcheck="false"
                    style="margin-left: -10px; " required id="id_password" />
                <i class="far fa-eye" id="togglePassword" style="margin-left: -35px; cursor: pointer;"></i>
                <script>
                const togglePassword = document.querySelector('#togglePassword');
                const password = document.querySelector('#id_password');
                togglePassword.addEventListener('click', function(e) {
                    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                    password.setAttribute('type', type);
                    this.classList.toggle('fa-eye-slash');
                });
                </script>
                <p class="error">
                    <?php echo $error; ?>
                </p>
                <p class="success">
                    <?php echo $success; ?>
                </p>
                <button name="submit">Change Password</button>
                <p class="message">Return to <a href="Home.php">Home</a></p>
            </form>
        </div>
    </div>
</body>

</html>
