<?php
//this file includes the functions to connect and use the database.
include('db.php');

$connection=db_connect();
function getAllPublishedPosts()
{
    global $connection;
    $query="SELECT posts.*, users.username FROM posts JOIN users ON posts.author_id=users.id WHERE published=1";
    return db_select($connection,$query);
}
function getTrendingPosts()
{
    global $connection;
    $query="SELECT posts.*, users.username
            FROM posts
            JOIN users ON posts.author_id=users.id
            WHERE published=1
            ORDER BY views DESC
            LIMIT 5";
    return db_select($connection,$query);
}
function getUserPosts($id)
{
    global $connection;
    $query="SELECT posts.*, users.username
            FROM posts 
            JOIN users ON posts.author_id=users.id 
            WHERE author_id='$id'";
    return db_select($connection,$query);
}
function selectOneRecord($id)
{
    global $connection;
    $query="SELECT posts.*, users.username FROM posts JOIN users ON posts.author_id=users.id WHERE posts.id=$id LIMIT 1";
    return db_select($connection,$query)[0];
}

function addNewPost($title,$content,$category,$author_id,$image, $published)
{
    global $connection;
    $query= "INSERT INTO posts (title,content,category,author_id,image,published)".
        " VALUES ('$title','$content','$category','$author_id','$image','$published')";
    $result =db_query($connection,$query);
    if($result===false)
    {
        return false;
    }
    else{
        return true;
    }
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

function createUser($username,$email,$password)
{
    global $connection;
    $query= "INSERT INTO users (username,email,password)".
        " VALUES ('$username','$email','$password')";
    $result =db_query($connection,$query);
    if($result===false)
    {
        return false;
    }
    else{
        return true;
    }

}

function checkEmailExists($email)
{
    global $connection;
    $query= "SELECT * FROM users WHERE email='$email' LIMIT 2";
    $result= mysqli_num_rows( db_query($connection,$query));
    if($result>0)
    {
        echo "BIGGER THAN 0";
        return true;
    }
    else
    {
        return false;
    }
}
function getUserByEmail($email)
{
    global $connection;
    $query= "SELECT * FROM users WHERE email='$email' LIMIT 1";
    return db_select($connection,$query)[0];
}
function getUserById($id)
{
    global $connection;
    $query= "SELECT * FROM users WHERE id='$id' LIMIT 1";
    return db_select($connection,$query)[0];
}

/**
 * Method to increase column 'views' in 'posts' table with every page visit. PS: page refresh will increase views too.
 * @param $id int id of the post to increment its views counter.
 * @return bool|mysqli_result true on success, false on failure.
 */
function incrementPostViews($id)
{
    global $connection;
    $query="UPDATE posts set views=views+1 WHERE id='$id'";
    return db_query($connection,$query);
}

function getUsersPass($email)
{

}



