<?php
namespace GreenThumb\NewsArticle;

use ArgumentCountError;
use DateTime;
use InvalidArgumentException;

/**
 * 
 */
class NewsArticle {
    private int $articleId;
    private DateTime $articleDate;
    private string $articleTitle;
    private string $articleContent;
    
    /**
     * 
     */
    function __construct(int $articleId, DateTime $articleDate, string $articleTitle, string $articleContent) {
        $this->articleId = $articleId;
        $this->articleDate = $articleDate;
        $this->articleTitle = $articleTitle;
        $this->articleContent = $articleContent;
    }

    /**
     * @return int
     */
    protected function getArticleId(): int {
        return $this->articleId;
    }

    /**
     * @param $articleId
     */
    protected function setArticleId(int $articleId): void {
        try {
            if (empty($articldId)) {
                throw new InvalidArgumentException();
            }

            $this->articleId = $articleId;
        } catch(ArgumentCountError $e) {
            echo 'Article ID argument not passed for some reason...';
        } catch(InvalidArgumentException $e) {
            echo 'Article ID must not be empty...';
        }
    }

    /**
     * @return DateTime
     */
    public function getArticleDate(): DateTime {
        return $this->articleDate;
    }
    
    /**
     * @param $articleDate
     */
    protected function setArticleDate(DateTime $articleDate) {
        $this->articleDate = $articleDate;
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
        $this->articleTitle = $articleTitle;
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
        $this->articleContent = $articleContent;
    }
}