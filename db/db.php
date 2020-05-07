<?php
/**
 * This file is responsible for all database communication. It includes main functions to execute queries.
 */
//Session will be required when connecting to db this is why I added it to db.php.
session_start();
include ('db_credentials.php');
//CREATE TABLES AFTER FIRST RUN:
//createTables();

/**
 * Method to connect to a database with credentials in db_credentials.php
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

/**
 * Method that can be used to create tables on first run.
 * @deprecated db_import replaces this.
 */
function createTables()
{
    $connection=db_connect();
    $query_users="CREATE TABLE 'users'(
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `username` varchar(255) NOT NULL,
            `email` varchar(255) NOT NULL,
            `password` varchar(255) NOT NULL,
            `creation_date` timestamp NOT NULL DEFAULT current_timestamp(),
            PRIMARY KEY (`id`),
            UNIQUE KEY `email` (`email`)
            ) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4";

    $query_posts="CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `content` longtext NOT NULL,
  `category` enum('politics','tech','entertainment','travel') NOT NULL,
  `author_id` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `image` text NOT NULL,
  `published` tinyint(1) NOT NULL,
  `views` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

    db_query($connection,$query_users);
    db_query($connection,$query_posts);
}


/**
 * OBS! Kan ta bort alla tabeller ut databasen om så önskas
 *
 * Importerar databastabeller och innehåll i databasen från en .sql-fil
 * Använd MyPhpAdmin för att exportera din lokala databas till en .sql-fil
 *
 * @param $db
 * @param $filename
 * @param $dropOldTables - skicka in TRUE om alla tabeller som finns ska tas bort
 */
function db_import($db, $filename, $dropOldTables=FALSE)
{
    // Om $dropOldTables är TRUE så ska vi ta bort alla gamla tabeller
    if ($dropOldTables)
    {
        // Börjar med att hämta eventuella tabeller som finns i databasen
        $query = 'SHOW TABLES';
        $result = db_query($db, $query);
        // Om några tabeller hämtats
        if ($result)
        {
            // Hämta rad för rad ur resultatet
            while ($row = mysqli_fetch_row($result))
            {
                $query = 'DROP TABLE ' . $row[0];
                //echo $query . '<br>';
                if (db_query($db, $query))
                    echo 'Tabellen <strong>' . $row[0] . '</strong> togs bort<br>';
            }
        }
    }
    $query = '';
    // Läs in filens innehåll
    $lines = file($filename);

    // Hantera en rad i taget
    foreach ($lines as $line) {
        // Gör inget med kommentarer eller tomma rader (gå till nästa rad)
        if (substr($line, 0, 2) == '--' || $line == '')
            continue;

        // Varje rad läggs till i frågan (query)
        $query .= $line;

        // Slutet på frågan är hittad om ett semikolon hittades i slutet av raden
        if (substr(trim($line), -1, 1) == ';') {
            //echo $query . '<br>';
            // Kör frågan mot databasen
            if (!db_query($db, $query))
                echo '<br>Fel i frågan: <strong>\''.$query.'\'</strong>:<br>' . db_error($db) . '<br>';

            // Töm $query så vi kan starta med nästa fråga
            $query = '';
        }
    }
    echo 'Importeringen är klar!<br>';
}
