<?php
//session_start();
////session_unset();
//session_destroy();
////$_SESSION=array();
//header("location:index.php");

session_start();
if(isset($_GET['tempid']))
{
    $_SESSION['id']=$_GET['tempid'];
}
else{
    $_SESSION['id']=3;

}
header("location:index.php");
