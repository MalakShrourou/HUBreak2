<?php
session_start();
if (!$database = mysqli_connect("localhost", "root", "12345678"))
    die("Sorry, could not connect to the server.");
if (!mysqli_select_db($database, "hubreak2_db"))
    die("Sorry, could not find database.");
extract($_POST);
$error = "";
if (isset($submit)) {
    $query = "SELECT * FROM customers WHERE email = '$email'";
    if (!$result = mysqli_query($database, $query))
        die("wrong query");
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        if ($password == $row['Password']) {
            $_SESSION['logged_in'] = true;
            $_SESSION['email'] = $email;
            $error = "";
            header("Location:Home.php");
        } else {
            $error = "Wrong Password";
            $_SESSION['logged_in'] = false;
        }
    } else {
        $error = "Invalid Email";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>HU Break</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="style.css" type="text/css">
</head>

<body>
    <img src="welcome3.png" height="150" width="500">
    <div class="login-page">
        <div class="form">
            <form class="login-form" method="POST" autocomplete="off">
                <input type="email" name="email" class="inputt" placeholder="Email" spellcheck="false" required />
                <input type="password" name="password" class="inputt" placeholder="Password (must contain 8 digits)"
                    spellcheck="false" style="margin-left: -10px; " required id="id_password" />
                <i class="far fa-eye" id="togglePassword" style="margin-left: -35px; cursor: pointer;"></i>
                <script>
                    const togglePassword = document.querySelector('#togglePassword');
                    const password = document.querySelector('#id_password');
                    togglePassword.addEventListener('click', function (e) {
                        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                        password.setAttribute('type', type);
                        this.classList.toggle('fa-eye-slash');
                    });
                </script>
                <p class="error">
                    <?php echo $error; ?>
                </p>
                <input type="submit" name="submit" class="submit" value="Login">
                <p class="message">Don't have an account? <a href="Signup.php">Signup</a></p>
            </form>
        </div>
    </div>
</body>

</html>