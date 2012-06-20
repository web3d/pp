<?php
#error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);

define('APP_PATH', dirname(__FILE__));
define('DS', DIRECTORY_SEPARATOR);

define('BLOG_RSS_URL', 'http://feed.cnblogs.com/blog/u/8623/rss');

require APP_PATH . '/lib/toro.php';
require APP_PATH . '/lib/Savant3.php';

$site = new ToroApplication(array(
    array('/', 'MainHandler'),
    array('([a-zA-Z0-9_]+)', 'MainHandler'),
    //array('article/([a-zA-Z0-9_]+)', 'ArticleHandler'),
));

$site->serve();

/**
 * @brief 实现系统类的自动加载
 * @param String $className 类名称
 * @return bool true
 */
function __autoload($className)
{
    $file = APP_PATH . '/source/' . ucfirst($className) . '.php';
    
    if (is_file($file)) {
        include($file);
    } else {
        exit('Class ' . $file . ' not found!');
    }
    return true;
}