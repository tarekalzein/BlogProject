<?php
//Session will be required when connecting to db this is why I added it to db.php.
session_start();

include_once ('db_credentials.php');
/**
 * Method to connecto to a database with credentials in db_credentials.php
 * @return false|mysqli returns instance of the connection to the database.
 */
function db_connect()
{
    // create db connection
    $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

    if($conn===false)
    {
        die("ERROR: Could not establish connection to database. " .mysqli_connect_error());
    }

    // sets the character encoding for communication with database to UTF-8
    mysqli_set_charset ( $conn , 'utf8' );
    return $conn;
}

/**
 * Method to disconnect and close a connection to free-up resources
 * @param $connection mysqli Connection instance.
 */
function db_disconnect($connection)
{
    if(isset($connection))
        mysqli_close($connection);
}

/**
 * Method to exectue a query on a db connection.
 * @param $connection mysqli Connection instance.
 * @param $query mysqli Query instance.
 * @return bool|mysqli_result true if query is executed successfully with return data.
 */
function db_query($connection, $query)
{
    $result= mysqli_query($connection,$query);
    if(!$result)
        echo "<br> Error in query: <strong>\''.$query.'\'</strong><br>". db_error($connection). '<br>';
    return $result;
}

/**
 * Executes a sql SELECT query
 * @param $connection
 * @param $query
 * @return array
 */
function db_select($connection, $query)
{
    $rows = array();
    $result = db_query($connection, $query);
    if($result)
    {
        //Fetches an array of rows from the query result. Each row in the array is a row in the query result.
        while ($row = mysqli_fetch_assoc($result))
        {
            $rows[] = $row;
        }
    }
    return $rows;
}

/**
 * Method/Function that calls the mysqli_real_escape_string to escapes special characters in a string for use in an SQL statement, taking into account the current charset of the connection
 * @param $connection
 * @param $query_string
 * @return string string without special characters.
 */
function db_escape($connection, $query_string)
{
    return mysqli_real_escape_string($connection,$query_string);
}



function db_error($connection)
{
    if(isset($connection))
        return mysqli_error($connection);
    return mysqli_connect_error();
}
