<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
<!--    <meta name="viewport" content="width=device-width,initial-scale=1.0">-->
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">

    <!--    Font Awesome implementation-->
    <script src="https://kit.fontawesome.com/dedb547a55.js" crossorigin="anonymous"></script>
    <!--    Google Font-->
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;600;700&display=swap" rel="stylesheet">
    <title>Access Denied</title>

</head>
<body>
<header>
    <?php include('header.php');?>
</header>
<div class="content">
    <div class="error-wrapper">
        <i class="fas fa-ban"></i>
        <h1> 403 </h1>
        <h2>Access Denied or Forbidden</h2>
        <h4>Please Log in or sign up to view this page.</h4>
        <h4><a href="login.php">Log in</a> &nbsp or &nbsp <a href="register.php">Sign up</a></h4>
    </div>
</div>


</body>
<footer>
    <?php include ('footer.php');?>
</footer>
</html>
