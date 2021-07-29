<?php
namespace GreenThumb\php;

use ArgumentCountError;
use DateTime;
use InvalidArgumentException;
use TypeError;

use function PHPSTORM_META\type;

/**
 * 
 */
class NewsArticle {
    private $articleId;
    private $articleDate;
    private $articleTitle;
    private $articleContent;
    
    /**
     * @param int $articleId
     * @param DateTime $articleDate
     * @param string $articleTitle
     * @param string $articleContent
     */
    function __construct(string $articleId, DateTime $articleDate, string $articleTitle, string $articleContent) {
        $this->setArticleId($articleId);
        $this->setArticleDate($articleDate);
        $this->setArticleTitle($articleTitle);
        $this->setArticleContent($articleContent);
    }

    /**
     * @return int
     */
    public function getArticleId(): string {
        return $this->articleId;
    }

    /**
     * @param $articleId
     */
    protected function setArticleId(string $articleId): void {
        try {
            if (empty($articleId)) {
                throw new InvalidArgumentException();
            }
            
            if (gettype($articleId) != 'string') {
                throw new TypeError();
            }

            // Set article id
            $this->articleId = $articleId;
        } catch(InvalidArgumentException $e) {
            echo $e;
            echo "Article ID cannot be empty...";
        } catch(TypeError $e) {
            echo $e;
            echo "Article ID must be an int.\n";
            echo "$articleId was given...";
        }
    }

    /**
     * @return DateTime
     */
    public function getArticleDate(): DateTime | null {
        // We can return null if its empty so we know whats going on.
        if (empty($this->articleDate)) {
            return null;
        }
        return $this->articleDate;
    }
    
    /**
     * @param $articleDate
     */
    protected function setArticleDate(DateTime $articleDate) {
        try {
            // Make sure our article date isn't empty
            if (empty($articleDate)) {
                throw new InvalidArgumentException();
            }
            $this->articleDate = $articleDate;
        } catch(ArgumentCountError) {
            echo "The article date wasn't passed...";
        } catch(InvalidArgumentException) {
            echo "The article date cannot be empty...";
        }
    }

    /**
     * @return string
     */
    public function getArticleTitle(): string {
        return $this->articleTitle;
    }

    /**
     * @param $articleTitle
     */
    protected function setArticleTitle(string $articleTitle): void {
        try {
            if (empty($articleTitle)) {
                throw new InvalidArgumentException();
            }
            $this->articleTitle = $articleTitle;
        } catch(ArgumentCountError $e) {
            echo $e;
            echo "Article title wasn't passed...";
        } catch(InvalidArgumentException $e) {
            echo $e;
            echo "Article title cannot be empty...";
        }
    }

    /**
     * @return string
     */
    public function getArticleContent(): string {
        return $this->articleContent;
    }

    /**
     * @param $articleContent
     */
    protected function setArticleContent(string $articleContent) {
        try {
            if (empty($articleContent)) {
                throw new InvalidArgumentException();
            }
            $this->articleContent = $articleContent;
        } catch(ArgumentCountError $e) {
            echo $e;
            echo "Article content wasn't passed...";
        } catch(InvalidArgumentException $e) {
            echo $e;
            echo "Article content must not be emtpy...";
        }
    }

    /* Special Getters */

    public function getAllArticles($db) {
        echo 'all thingies!!';
    }
}
