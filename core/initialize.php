<?php
    //directory separators
    define('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
    define('SITE_ROOT') ? null : define('SITE_ROOT', DS . 'xamp_8.0.5' .DS. 'htdocs'.DS.'phprest');
    //xamp_8.0.5/htdocs/phprest/includes
    define('INC_PATH') ? null : define('INC_PATH', SITE_ROOT.DS.'includes');
    define('CORE_PATH') ? null : define('CORE_PATH', SITE_ROOT.DS.'core');

    //load the config file first
    require_once(INC_PATH.DS."config.php");
    //core classes

    require_once(CORE_PATH.DS."post.php");

?>