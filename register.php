<?php
include('controllers/verify.php');
global $errors;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
<!--    <meta name="viewport" content="width=device-width,initial-scale=1.0">-->
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <script src="javascript/scripts.js"></script>

    <!-- Sweet Alert Custom Alert  https://sweetalert.js.org/guides/ -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!--    Font Awesome implementation-->
    <script src="https://kit.fontawesome.com/dedb547a55.js" crossorigin="anonymous"></script>
    <!--    Google Font-->
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;600;700&display=swap" rel="stylesheet">
    <title>Sign up</title>

</head>
<body>
<header>
    <?php include('header.php');?>
</header>
<div class="content">
    <div class="main-content-wrapper clearfix">

        <div class="register-content">
            <h1>Sign up</h1>
            <div class="form-error-msg">
                    <?php
                    if(isset($errors))
                    {
                        if(count($errors)>0)
                        {
                            foreach ($errors as $error)
                            {
                                echo  "<li>$error </li>";
                            }
                        }
                    }
                    ?>


            </div>
            <form action="register.php" method="post">
                <input type="text" name="username" placeholder="Username" value="<?php if(isset($_POST['username'])){echo $_POST['username'];}?>"> <!--php code to remember inputs if validation fails.-->
                <br>
                <input type="email" name="email" placeholder="Email" value="<?php if(isset($_POST['email'])){echo $_POST['email'];}?>"> <!--php code to remember inputs if validation fails.-->
                <br>
                <input type="password" name="password" placeholder="Password">
                <br>
                <input type="password" name="passwordConfirmation" placeholder="Repeat password">
                <br>
                <button type="submit" name="register">Sign up</button>
                <br>
            </form>
        </div>
    </div>


</div>
<footer>
    <?php include ('footer.php');?>
</footer>
</body>
</html>
