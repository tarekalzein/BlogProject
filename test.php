<?php
//
//$link=mysqli_connect("localhost","root","","blog");
//
//if($link===false)
//{
//    die("error: db connection error".mysqli_connect_error());
//}
//
//
//$sql="INSERT INTO posts (title,content,author) VALUES ('TestTitle','ThisIsATestContent','TarekTheTester')";
//
//if(mysqli_query($link,$sql)){
//    echo "Records inseted successfully";
//}else{
//    echo "ERROR: not able to execute $sql".mysqli_error($link);
//}
//mysqli_close($link);
include ('db/sql_query.php');
?>
<!--<form action="" method="post">-->
<!--    Title: <input type="text" name="title" placeholder="title"><br>-->
<!--    Content: <textarea name="content" id="" cols="30" rows="10"></textarea>-->
<!--    <button type="submit">Submit</button>-->
<!--</form>-->
<?php
//if(isset($_POST)){
//    if(isset($_POST['title']) && isset($_POST['content'])){
//        echo $_POST['title'];
//        echo "<br>";
//        echo $_POST['content'];
//        $connection=db_connect();
//        $title=$_POST['title'];
//        $content=$_POST['content'];
//        $author='TarekAlzein';
//        $query= "INSERT INTO posts (title,content,author) VALUES ('$title','$content','$author')";
//    db_query($connection,$query);
//    db_disconnect($connection);
//
//    }
//
//
//}

//echo "testing the getallposts function:";
//print_r(getAllPublishedPosts());




