CREATE DATABASE IF NOT EXISTS GT_DB_2;
USE GT_DB_2;

CREATE TABLE IF NOT EXISTS gt_news (
    article_id INT UNIQUE NOT NULL;
    article_title VARCHAR(255) NOT NULL;
    article_date DATETIME NOW NOT NULL;
    article_content TEXT NOT NULL;
);
