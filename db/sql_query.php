<?php
/**
 * Includes all functions that executes queries in the database.
 */
//this file includes the functions to connect and use the database.
include('db.php');

$connection=db_connect();

/**
 * Get all published posts form database.
 * @return array published posts.
 */
function getAllPublishedPosts()
{
    global $connection;
    $query="SELECT posts.*, users.username
            FROM posts
            JOIN users ON posts.author_id=users.id 
            WHERE published=1 
            order by date DESC";
    return db_select($connection,$query);
}

/**
 * Fetches all published posts filtered by a category.
 * @param $category enums in database that represent post categories.
 * @return array result of query.
 */
function getPublishedByCategory($category)
{
    global $connection;
    $query="SELECT posts.*, users.username
            FROM posts
            JOIN users ON posts.author_id=users.id 
            WHERE published=1
            AND category='$category'
            order by date DESC";
    return db_select($connection,$query);
}

/**
 * Fetches published posts by a specific user.
 * @param $userId
 * @return array
 */
function getPublishedByUser($userId)
{
    global $connection;
    $query="SELECT posts.*, users.username
            FROM posts
            JOIN users ON posts.author_id=users.id 
            WHERE published=1
            AND author_id='$userId'
            order by date DESC";
    return db_select($connection,$query);
}

/**
 * Fetches the 5 most recent published posts
 * @return array
 */
function getRecentPublishedPosts()
{
    global $connection;
    $query="SELECT posts.*, users.username 
            FROM posts 
            JOIN users ON posts.author_id=users.id 
            WHERE published=1 
            order by date DESC limit 5";
    return db_select($connection,$query);
}

/**
 * Fetches published posts ordered by their views column in database. Limited to 5
 * posts will be shown in carousel.
 * @return array
 */
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

/**
 * Fetches array of users who has most number of posts.
 * @return array
 */
function getTopUsers()
{
    global $connection;
    $query="SELECT COUNT(posts.author_id) AS totalPosts,posts.author_id,users.username 
            FROM posts 
            JOIN users ON posts.author_id=users.id 
            GROUP BY posts.author_id
            ORDER BY totalPosts DESC
            LIMIT 10";
    return db_select($connection,$query);
}

/**
 * Fetches all users from DB.
 * @return array
 */
function getAllUsers()
{
    global $connection;
    $query="SELECT users.username, users.id
            FROM users";
    return db_select($connection,$query);
}

/**
 * Fetches a specific user's posts including non-published.
 * @param $id
 * @return array
 */
function getUserPosts($id)
{
    global $connection;
    $query="SELECT posts.*, users.username
            FROM posts 
            JOIN users ON posts.author_id=users.id 
            WHERE author_id='$id'";
    return db_select($connection,$query);
}

/**
 * fetches one record from posts tables.
 * @param $id int id of the post to be fetched.
 * @return mixed
 */
function selectOneRecord($id)
{
    global $connection;
    $query="SELECT posts.*, users.username 
            FROM posts 
            JOIN users ON posts.author_id=users.id 
            WHERE posts.id=$id 
            LIMIT 1";
    return db_select($connection,$query)[0];
}

/**
 * Function to add a new post to the database.
 * @param $title string title of the new blog post
 * @param $content string formatted content of the new blog post
 * @param $category string category of the new blog post
 * @param $author_id int the logged in user that is creating the new post.
 * @param $image string image path of the new blog post
 * @param $published bool whether post should be set to published or not
 * @return bool true on success
 */
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
 * Method to edit a post by its ID.
 * @param $postId int id of post to be edited.
 * @param $title
 * @param $content
 * @param $category
 * @param $image
 * @param $published
 * @return bool true on success.
 */
function updatePost($postId,$title,$content,$category,$image, $published)
{
    global $connection;
    $query="UPDATE posts 
            set title='$title', content='$content',category='$category', image='$image', published='$published' 
            WHERE id='$postId'";
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

/**
 * Method to create a new user in the users table.
 * @param $username string username
 * @param $email string email
 * @param $password string hashed password
 * @return bool true on success.
 */
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

/**
 * Method to check if email exists in users table
 * used in the login.php
 * @param $email string email of user in the login page.
 * @return bool true if email already exists.
 */
function checkEmailExists($email)
{
    global $connection;
    $query= "SELECT * 
             FROM users 
             WHERE email='$email' 
             LIMIT 2";
    $result= mysqli_num_rows( db_query($connection,$query));
    if($result>0)
    {
        return true;
    }
    else
    {
        return false;
    }
}

/**
 * retrieves the user by his/her email after login.
 * @param $email string login email.
 * @return mixed
 */
function getUserByEmail($email)
{
    global $connection;
    $query= "SELECT * 
             FROM users 
             WHERE email='$email' 
             LIMIT 1";
    return db_select($connection,$query)[0];
}

/**
 * Fetches user data by its ID.
 * @param $id int id of user.
 * @return mixed
 */
function getUserById($id)
{
    global $connection;
    $query= "SELECT * 
             FROM users 
             WHERE id='$id' 
             LIMIT 1";
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
    $query="UPDATE posts 
            set views=views+1 
            WHERE id='$id'";
    return db_query($connection,$query);
}

/**
 * Method to delete one single post from the database by its id.
 * @param $id int id of the post to be deleted
 * @return bool|mysqli_result
 */
function deletePost($id)
{
    global $connection;
    $query="DELETE FROM posts 
            WHERE id='$id'";
    return db_query($connection,$query);
}

/**
 * Method to update the image path of an edited post.
 * @param $id int id of post where image path will be updated
 * @param $newImage string Path of the new image.
 * @return bool|mysqli_result
 */
function replacePostImage($id, $newImage)
{
    global $connection;
    $query="UPDATE posts 
            set image='$newImage' 
            WHERE id='$id'";
    return db_query($connection,$query);
}



