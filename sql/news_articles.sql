CREATE OR REPLACE TABLE news_articles(
    articleId VARCHAR(120) NOT NULL UNIQUE PRIMARY KEY,
    articleDate DATETIME NOT NULL,
    articleTitle TEXT NOT NULL,
    articleContent TEXT NOT NULL,
    articleImages TEXT NOT NULL
);

