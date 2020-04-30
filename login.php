<?php
include ('db/sql_query.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="javascript/scripts.js"></script>

    <!-- Sweet Alert Custom Alert  https://sweetalert.js.org/guides/ -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!--    Font Awesome implementation-->
    <script src="https://kit.fontawesome.com/dedb547a55.js" crossorigin="anonymous"></script>
    <!--    Google Font-->
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;600;700&display=swap" rel="stylesheet">
    <title>Login</title>

</head>
<body>
<header>
    <?php include('header.php');?>
</header>
<div class="content">
    <div class="main-content-wrapper clearfix">
        <div class="login-content">
            <form action="">
                <h1>Login</h1>
                <form action="" method="post">
                    <input type="email" name="email" placeholder="Email">
                    <br>
                    <input type="password" name="password" placeholder="Password">
                    <br>

                    <button type="submit" name="login">Log in</button>
                    <br>
                </form>
            </form>
        </div>
        <div class="register-content">
            <h4>Don't have an account? sign up!</h4>
            <h1>Sign up</h1>
            <form action="" method="post">
                <input type="text" name="firstname" placeholder="First name">
                <br>
                <input type="text" name="lastname" placeholder="Last name">
                <br>
                <input type="email" name="email" placeholder="Email">
                <br>
                <input type="password" name="password" placeholder="Password">
                <br>
                <input type="password" name="repeated-password" placeholder="Repeat password">
                <br>
                <button type="submit" name="register">Sign up</button>
                <br>
            </form>
        </div>
    </div>


    </div>
</body>
<footer>
    <?php include ('footer.php');?>
</footer>
</html>
