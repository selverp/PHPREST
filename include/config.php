<?php
    //db config
    $db_user = 'root';
    $db_password = '';
    $db_name = 'db_phprest';
    $db_servername = 'localhost';
    $db = new PDO("mysql:host=$db_servername;dbname=$db_name", $db_user, $db_password);
    //$db = new PDO ( "mysql:host=$db_servername;dbname=$db_name", "$db_user", "$db_password", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

    //set some db attributes
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    //$db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, false);
    $db->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ); 
    

    define('APP_NAME', 'PHP REST API TUTORIAL')
?>