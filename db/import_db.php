<?php
/**
 * File to execute the db_import on the first run. MUST NOT BE RECALLED AFTER FIRST RUN since it will drop all tables.
 */
include_once ('db.php');
db_import(db_connect(),'blog.sql',true);
echo 'done';
