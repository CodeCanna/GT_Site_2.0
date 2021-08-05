<?php
require_once(dirname(__DIR__, 4) . "/vendor/autoload.php");
require_once(dirname(__DIR__, 4) . "/Classes/NewsArticle.php");
require_once(dirname(__DIR__, 4) . "/Classes/DBConnection.php");

use GreenThumb\php\DBGTConnection;
use GreenThumb\php\NewsArticle;

// Create empty reply
$reply = new stdClass();
$reply->status = 200;
$reply->data = null;

try {
    // Get the request method
    $method = array_key_exists("HTTP_X_HTTP_METHOD", $_SERVER) ? $_SERVER["HTTP_X_HTTP_METHOD"] : $_SERVER["REQUEST_METHOD"];

    // Connect to the DB
    $db = new DBGTConnection('secrets.json');

    if (! $db->checkConnection()) {
        throw new Exception("There was a problem connecting to the database...");
    }

    if ($method === 'GET') {
        echo "GET";
    } elseif ($method === 'POST') {
        // Create our news article
        $articleId = uniqid('article', true); // Generate ID for article
        $articleDateTime = new DateTime();

        // Datetime to string
        $articleDateTimeStr = $articleDateTime->format('Y-m-d H:i:s');
        // Get the content from our $_POST array
        $articleTitle = $_POST['articleTitle'];
        $articleContent = $_POST['articleContent'];

        $newArticle = new NewsArticle($articleId, $articleDateTime, $articleTitle, $articleContent, $_FILES);

        $articleImagesStr = serialize($newArticle->getArticleImages());
        
        //Store our data
        $db->query("INSERT INTO news_articles (articleId, articleDate, articleTitle, articleContent, articleImages) VALUES ('$articleId', '$articleDateTimeStr', '$articleTitle','$articleContent', '$articleImagesStr')");

        var_dump($db);

        $db->close();
    }
} catch (Exception $e) {
    echo $e;
}