<?php
//this file includes the functions to connect and use the database.
include('db.php');

$connection=db_connect();
function getAllPublishedPosts()
{
    global $connection;
    $query="SELECT * FROM posts WHERE published=1";
    return db_select($connection,$query);
}
function getOnePost($id)
{
    global $connection;
    $query="SELECT * FROM posts WHERE id=$id";
    return db_select($connection,$query)[0];
}

function addNewPost($title,$content,$category,$author,$image, $published)
{
    global $connection;
    $query= "INSERT INTO posts (title,content,category,author,image,published)".
        " VALUES ('$title','$content','$category','$author','$image','$published')";
    $result =db_query($connection,$query);
    if($result===false)
    {
        return false;
    }
    else{
        return true;
    }
}
function getTrendingPosts()
{
    global $connection;
    $query="SELECT * FROM posts WHERE published=1 LIMIT 5";
    return db_select($connection,$query);
}

/**
 * Method to Cut A String To A Specified Length With PHP
 * Code found on internet: https://www.hashbangcode.com/article/cut-string-specified-length-php
 * @param $text string text to be edited.
 * @param $maxchar int max number of characters in the output.
 * @return string returns a string after trimming.
 */
function substrwords($text,$maxchar)
{
    $end='...';
    if (strlen($text) > $maxchar || $text == '') {
        $words = preg_split('/\s/', $text);
        $output = '';
        $i      = 0;
        while (1) {
            $length = strlen($output)+strlen($words[$i]);
            if ($length > $maxchar) {
                break;
            }
            else {
                $output .= " " . $words[$i];
                ++$i;
            }
        }
        $output .= $end;
    }
    else {
        $output = $text;
    }
    return $output;
}






















////Access to the connection object.
//require('connect.php');
//
//
///**
// *Method that returns a result of all items in a table
// * @param $table: The desired table name which holds the data.
// * @var $conn: Global variable of connection from connect.php.
// * @return array of multiple arrays, each holds data of a row from the database table.
// * */
//function selectAll($table, $conditions=[])
//{
//    global $conn;
//    $sql= "SELECT * FROM $table";
//    //Fetch all data from db
//
//    if(empty($conditions))
//    {
//
//        $stmt= $conn->prepare($sql); //prepared statement (to prevent sql injection).
//        $stmt->execute();
//        $result=$stmt-> get_result()->fetch_all(MYSQLI_ASSOC);
//    }else{
//
//        }
//
//    return $result;
//}
//
//function addPost($title,$content,$author)
//{
//    global $conn;
//    $sql="INSERT INTO posts (title, content, author) VALUES ($title, $content, $author)";
//
////    $sql= "INSERT INTO posts SET title='$title', content='$content',author='author'";
////    $stmt= $conn->prepare($sql); //prepared statement (to prevent sql injection).
////    $stmt->execute();
//    if($conn->query($sql)===true)
//    {
//        echo "New record created successfully";
//    } else {
//        echo "Error: " . $sql . "<br>" . $conn->error;
//    }
//
//    $conn->close();
//
//
//}
//
//
//$users=selectAll('users');
//echo "<pre>", print_r($users,true) , "</pre>";
//
//for ($j =0;$j<count($users);$j++) {
//    echo print_r($users[$j]['password']."<br>",true);
//}

