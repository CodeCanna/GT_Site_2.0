<?php
require_once(dirname(__DIR__, 4) . "/vendor/autoload.php");
require_once(dirname(__DIR__, 4) . "/Classes/NewsArticle.php");

use GreenThumb\php\NewsArticle;

// Create empty reply
$reply = new stdClass();
$reply->status = 200;
$reply->data = null;

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
        $articleTitle = $_POST['articleTitle'];
        $articleContent = $_POST['articleContent'];

        $newArticle = new NewsArticle($articleId, $articleDateTime, $articleTitle, $articleContent, $_FILES);

        var_dump($newArticle);
    }
} catch (Exception $e) {
    echo $e;
}