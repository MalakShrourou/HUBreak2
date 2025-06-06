<?php
session_start();
if (!$database = mysqli_connect("localhost", "root", "12345678", "hubreak2_db"))
    die("Sorry, could not connect to the server.");
extract($_POST);
$error = "";
$success = "";
if (isset($submit)) {
    $sequery = "SELECT * FROM customers WHERE email = '$email'";
    if (!$result = mysqli_query($database, $sequery))
        die("wrong query");
    if (mysqli_num_rows($result) == 0)
        if (preg_match('/@gmail\.com$/i', $email)) {
            if (preg_match('/^([0-9A-Za-z_$]{8,})$/', $password))
                if ($password == $confirmpassword) {
                    $inquery = "INSERT INTO customers (Name, Email, Password) VALUES ('$name','$email','$password')";
                    mysqli_query($database, $inquery);
                    $success = "Account Created";
                } else
                    $error = "Dismatch";
            else
                $error = "Invalid Password";
        } else
            $error = "Invalid Email";
    else
        $error = "Email Already Exists";
}
mysqli_close($database);
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <style>
        @import url(https://fonts.googleapis.com/css?family=Roboto:300);

        * {
            font-family: 'Times New Roman', Times, serif;
        }

        body {
            background-image: url("cover.jpg");
        }

        img {
            margin: 1% auto 0 30%;
        }

        .login-page {
            width: 460px;
            padding: 10px;
            margin: 0 auto 0 30%;
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

        .inputt {
            background: #f2f2f2;
            width: 90%;
            border: 0;
            margin: 0 0 15px;
            padding: 15px;
            box-sizing: border-box;
            font-size: 14px;
            border-radius: 30px;
        }

        .submit {
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
            font-size: 12px;
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

        .error {
            color: red;
            font-weight: bold;
            text-align: center;
        }

        .success {
            color: lawngreen;
            font-weight: bold;
            text-align: center;
        }
    </style>
</head>

<body>
    <img src="welcome3.png" height="150" width="500">
    <div class="login-page">
        <div class="form">
            <form class="login-form" method="POST" autocomplete="off">
                <input type="text" name="name" class="inputt" placeholder="Name" required />
                <input type="email" name="email" class="inputt" placeholder="Email" required />
                <input type="password" name="password" class="inputt" placeholder="Password (must contain 8 digits)"
                    spellcheck="false" style="margin-left: -10px; " required id="id_password" />
                <i class="far fa-eye" id="togglePassword" style="margin-left: -35px; cursor: pointer;"></i>
                <input type="password" name="confirmpassword" class="inputt" placeholder="Confirm Password" required
                    spellcheck="false" style="margin-left: -10px; " required id="id_confirmpassword" />
                <i class="far fa-eye" id="togglePassword2" style="margin-left: -35px; cursor: pointer;"></i>
                <p class="error">
                    <?php echo $error; ?>
                </p>
                <p class="success">
                    <?php echo $success; ?>
                </p>
                <input type="submit" name="submit" class="submit" value="Create Account">
                <p class="message">Already have an account? <a href="Login.php">Sign In</a></p>
            </form>
        </div>
    </div>
</body>
<script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#id_password');
    const togglePassword2 = document.querySelector('#togglePassword2');
    const cpassword = document.querySelector('#id_confirmpassword');
    togglePassword.addEventListener('click', function (e) {
        // toggle the type attribute
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        // toggle the eye slash icon
        this.classList.toggle('fa-eye-slash');
    });
    togglePassword2.addEventListener('click', function (e) {
        // toggle the type attribute
        const type = cpassword.getAttribute('type') === 'password' ? 'text' : 'password';
        cpassword.setAttribute('type', type);
        // toggle the eye slash icon
        this.classList.toggle('fa-eye-slash');
    });
</script>

</html>