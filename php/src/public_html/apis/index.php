<?php
require_once(dirname(__DIR__, 3) . "/vendor/autoload.php");
require_once(dirname(__DIR__, 2) . "/Classes/NewsArticle.php");

// Create empty reply
$reply = new stdClass();
$reply->status = 200;
$reply->data = null;

// Lets check our request method
$method = array_key_exists("HTTP_X_HTTP_METHOD", $_SERVER) ? $_SERVER["HTTP_X_HTTP_METHOD"] : $_SERVER["REQUEST_METHOD"];

try {

} catch (Exception $e) {
    $et = get_class($e);
    throw new $et($e->getMessage());
}

