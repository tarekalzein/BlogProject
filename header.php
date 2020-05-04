<?php
include_once('db/sql_query.php');
if(isset($_SESSION['id']))
{
    $id=$_SESSION['id'];
    $user=getUserById($id);
    $username=$user['username'];
    $link='<li><a href="dashboard.php" class="logged-in">'.$username.'</a></li>';
}
else{
    $link="<li><a href=\"login.php\">Log in</a></li>";
}
?>
<div class="logo">
    <a href="index.php"><h1 class="logo_text">Some<span>Blog</span></h1></a>
</div>
<i class="fa fa-bars menu_button"></i>
<ul class="nav">
    <li><a href="index.php">Home</a></li>
    <li><a href="#">Politics</a></li>
    <li><a href="#">Tech</a></li>
    <li><a href="#">Entertainment</a></li>
    <li><a href="#">Travel</a></li>
    <?php echo $link ?>
    <li></li>

</ul>
<!--JQuery CDNJS min-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>

<!--JS script -->
<script src="javascript/scripts.js"></script>

