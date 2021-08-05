<?php

namespace GreenThumb\php;

use ArgumentCountError;
use DateTime;
use Exception;
use InvalidArgumentException;
use TypeError;

use function PHPSTORM_META\type;

// Define our upload directory
define('UPLOAD_DIR', dirname(__DIR__, 2) . "/resources/images");

/**
 * This class represents a GreenThumb news/product update article
 * 
 * @var string $articleId
 * @var DateTime $articleDate
 * @var string $articleTitle
 * @var string $articleContent
 * @var array $articleImages
 */
class NewsArticle
{
    private $articleId;
    private $articleDate;
    private $articleTitle;
    private $articleContent;
    private static $articleImages;

    /**
     * @param string $articleId
     * @param DateTime $articleDate
     * @param string $articleTitle
     * @param string $articleContent
     * @param array $articleImages
     */
    function __construct(string $articleId, DateTime $articleDate, string $articleTitle, string $articleContent, array $articleImages)
    {
        $this->setArticleId($articleId);
        $this->setArticleDate($articleDate);
        $this->setArticleTitle($articleTitle);
        $this->setArticleContent($articleContent);
        $this->setArticleImages($articleImages);
    }

    /**
     * @return int
     */
    public function getArticleId(): string
    {
        return $this->articleId;
    }

    /**
     * @param $articleId
     */
    protected function setArticleId(string $articleId): void
    {
        try {
            if (empty($articleId)) {
                throw new InvalidArgumentException();
            }

            if (gettype($articleId) != 'string') {
                throw new TypeError();
            }

            // Set article id
            $this->articleId = $articleId;
        } catch (InvalidArgumentException $e) {
            echo $e;
            echo "Article ID cannot be empty...";
        } catch (TypeError $e) {
            echo $e;
            echo "Article ID must be an int.\n";
            echo "$articleId was given...";
        }
    }

    /**
     * @return DateTime
     */
    public function getArticleDate(): DateTime | null
    {
        // We can return null if its empty so we know whats going on.
        if (empty($this->articleDate)) {
            return null;
        }
        return $this->articleDate;
    }

    /**
     * @param $articleDate
     */
    protected function setArticleDate(DateTime $articleDate)
    {
        try {
            // Make sure our article date isn't empty
            if (empty($articleDate)) {
                throw new InvalidArgumentException();
            }
            $this->articleDate = $articleDate;
        } catch (ArgumentCountError) {
            echo "The article date wasn't passed...";
        } catch (InvalidArgumentException) {
            echo "The article date cannot be empty...";
        }
    }

    /**
     * @return string
     */
    public function getArticleTitle(): string
    {
        return $this->articleTitle;
    }

    /**
     * @param $articleTitle
     */
    protected function setArticleTitle(string $articleTitle): void
    {
        try {
            if (empty($articleTitle)) {
                throw new InvalidArgumentException();
            }
            $this->articleTitle = $articleTitle;
        } catch (ArgumentCountError $e) {
            echo $e;
            echo "Article title wasn't passed...";
        } catch (InvalidArgumentException $e) {
            echo $e;
            echo "Article title cannot be empty...";
        }
    }

    /**
     * @return string
     */
    public function getArticleContent(): string
    {
        return $this->articleContent;
    }

    /**
     * @param $articleContent
     */
    protected function setArticleContent(string $articleContent)
    {
        try {
            if (empty($articleContent)) {
                throw new InvalidArgumentException();
            }
            $this->articleContent = $articleContent;
        } catch (ArgumentCountError $e) {
            echo $e;
            echo "Article content wasn't passed...";
        } catch (InvalidArgumentException $e) {
            echo $e;
            echo "Article content must not be emtpy...";
        }
    }

    public function getArticleImages(): array | NULL
    {
        return $this->articleImages;
    }

    /**
     * This function is a little tricky.  The stucture of the $_FILES array determines how this function was written.
     * it parses the initial $_FILES array and creates a simpliefied version of the array, then it moves the files to the upload directory storing the file path in the 
     * php object
     * 
     * @param array $imgArray
     */
    protected function setArticleImages(array $imgArray): void
    {
        try {
            if (!empty($imgArray)) {
                // Check the number of files sent
                if (sizeof($imgArray) > 5) {
                    throw new Exception("Too many images sent, send 5 or less images...");
                }

                // Parse the image array
                foreach ($imgArray as $img => $imgData) {
                    $this->articleImages[$imgData['name']] = $imgData['tmp_name'];
                }
            } else {
                // Set articleImages to NULL if none are found
                $this->articleImages = NULL;
            }

            // Check that our uploads directory exists
            if (!is_dir(UPLOAD_DIR)) {
                throw new Exception("Can't find the uploads directory, looking in make sure it exists...");
            }

            // Move uploaded files to the news uploads directory based on file type
            foreach ($this->articleImages as $img => $imgPath) {
                if (pathinfo(UPLOAD_DIR."$img", PATHINFO_EXTENSION) === 'jpg' || pathinfo(UPLOAD_DIR."$img", PATHINFO_EXTENSION) === 'jpeg')
                {
                    move_uploaded_file($imgPath, UPLOAD_DIR . "/jpg/" . $img);
                    $this->articleImages[$img] = UPLOAD_DIR . "/jpg/" . $img;
                } else {
                    move_uploaded_file($imgPath, UPLOAD_DIR . "/png/" . $img);
                    $this->articleImages[$img] = UPLOAD_DIR . "/png/" . $img;
                }
            }
        } catch (Exception $e) {
            echo $e;
        }
    }

    /* Special methods */

    /**
     * This function serializes $articleImages to store in the API
     * 
     * @return string
     */
    public static function serializeArticleImages(): string
    {
        return serialize(self::$articleImages);
    }

    /* Special Getters */

    /**
     * 
     */
    public function getAllArticles($db)
    {
        echo 'all thingies!!';
    }
}
