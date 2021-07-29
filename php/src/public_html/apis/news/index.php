<?php
require_once(dirname(__DIR__, 4) . "/vendor/autoload.php");
require_once(dirname(__DIR__, 3) . "/Classes/NewsArticle.php");

use DateTime;
use GreenThumb\php\NewsArticle;
use mysqli;

// Create empty reply
$reply = new stdClass();
$reply->status = 200;
$reply->data = null;

try {
    // Lets get our secret sauce
    $saucyPath = 'secrets.json';//'/home/greenthu/secrets.json';
    $sauce = fopen($saucyPath, 'r') ? fread($sauce, filesize($sauce)) : throw new Exception();
} catch(Exception | Error $e) {
    echo $e;
    echo 'There was a problem reading form the secret sauce!  Exitting...';
    return 1;
}



try {
    // Get the request method
    $method = array_key_exists("HTTP_X_HTTP_METHOD", $_SERVER) ? $_SERVER["HTTP_X_HTTP_METHOD"] : $_SERVER["REQUEST_METHOD"];

    if ($method === 'GET') {
        echo "GET";
    } elseif ($method === 'POST') {
        // Create our news article
        $articleId = uniqid(); // Generate ID for article
        $articleDateTime = new DateTime();
        // Get the content from our $_POST array
        // Convert date string to
        $articleTitle = $_POST['articleTitle'];
        $articleContent = $_POST['articleContent'];

        $newArticle = new NewsArticle($articleId, $articleDateTime, $articleTitle, $articleContent);

        var_dump($newArticle);
    }
} catch (Exception $e) {
    echo $e;
}