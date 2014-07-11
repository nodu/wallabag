<?php
// PHP 5.3 minimum
if (version_compare(PHP_VERSION, '5.3.3', '<')) {
    die('This software require PHP 5.3.3 minimum');
}

// Short tags must be enabled for PHP < 5.4
if (version_compare(PHP_VERSION, '5.4.0', '<')) {

    if (! ini_get('short_open_tag')) {
        die('This software require to have short tags enabled, check your php.ini => "short_open_tag = On"');
    }
}

$writableFolders = array('cache', 'db');
foreach ($writableFolders as $folder) {
    if (! is_writable($folder)) {
        die('The directory "' . $folder . '" must be writeable by your web server user');
    }
}

// install folder still present, need to install wallabag
if (is_dir('install')) {
    require('install/index.php');
    exit;
}