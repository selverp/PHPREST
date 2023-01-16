<?php
    //directory separators
    defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
    defined('SITE_ROOT') ? null : define('SITE_ROOT', DS . 'xampp' .DS. 'htdocs'.DS.'phprest');
    //xamp_8.0.5/htdocs/phprest/includes
    defined('INC_PATH') ? null : define('INC_PATH', SITE_ROOT.DS.'include');
    defined('CORE_PATH') ? null : define('CORE_PATH', SITE_ROOT.DS.'core');

    //load the config file first
    require_once(INC_PATH.DS."config.php");
   
    //core classes
    require_once(CORE_PATH.DS."post.php");

    //echo DS;
    //echo INC_PATH . "<br>";
    //echo CORE_PATH . "<br>";

?>