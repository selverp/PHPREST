<?php
    //db config
    $db_user = 'root';
    $db_password = '';
    $db_name = 'db_phprest';
    $db_servername = 'localhost';
   // $db = new PDO('mysql:host=127.0.0.1;dbname'.$db_name.';charset=utf8',$db_user,$db_password);
   $db = new PDO("mysql:host=$db_servername;dbname=$db_name", $db_user, $db_password);
    //set some db attributes
    // $db->seAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    // $db->seAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, false);
    // $db->seAttribute(PDO::ATTR_ERRMODE, PDO::ERRMOD_EXCEPTION);

    define('APP_NAME', 'PHP REST API TUTORIAL')
?>