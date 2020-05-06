<?php
include('db/sql_query.php');

$users=getAllUsers();
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
    <title>Users</title>

</head>
<body>
<header>
    <?php include('header.php');?>
</header>
<div class="content">

    <!--    Main Content Section-->
    <div class="main-content-wrapper clearfix">
        <h1>List of all our bloggers:</h1>
        <ul>
            <?php foreach ($users as $user): ?>
                <li><a href="topics.php?user=<?php echo $user['id'];?>"><?php echo $user['username'];?> </a></li>
            <?php endforeach;?>

        </ul>

    </div>
</div>

<!--Slick JS script import using cdn.-->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

</body>
<footer>
    <?php include ('footer.php');?>
</footer>
</html>
