<?php
namespace GreenThumb\NewsArticle;

use DateTime;

/**
 * 
 */
class NewsArticle {
    public int $articleId;
    public DateTime $articleDate;
    public string $articleTitle;
    public string $articleContent;
    
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
    public function getArticleId(): int {
        return $this->articleId;
    }

    /**
     * @param $articleId
     */
    protected function setArticleId(int $articleId): void {
        $this->articleId = $articleId;
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