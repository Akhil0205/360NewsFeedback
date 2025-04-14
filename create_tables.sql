-- Create news_categories table
CREATE TABLE IF NOT EXISTS news_categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL UNIQUE,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create news_articles table
CREATE TABLE IF NOT EXISTS news_articles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    source VARCHAR(100) NOT NULL,
    url VARCHAR(255) NOT NULL,
    image_url VARCHAR(255),
    category_id INT,
    published_at DATETIME NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (category_id) REFERENCES news_categories(id) ON DELETE SET NULL
);

-- Create users table with roles
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('user', 'admin') DEFAULT 'user',
    status ENUM('active', 'inactive') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    last_login DATETIME
);

-- Create article_feedback table
CREATE TABLE IF NOT EXISTS article_feedback (
    id INT AUTO_INCREMENT PRIMARY KEY,
    article_id INT NOT NULL,
    user_id INT NOT NULL,
    rating INT NOT NULL CHECK (rating BETWEEN 1 AND 5),
    comment TEXT,
    sentiment ENUM('positive', 'neutral', 'negative'),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (article_id) REFERENCES news_articles(id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    UNIQUE KEY unique_feedback (article_id, user_id)
);

-- Create feedback_tags table
CREATE TABLE IF NOT EXISTS feedback_tags (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create feedback_tag_relations table
CREATE TABLE IF NOT EXISTS feedback_tag_relations (
    feedback_id INT NOT NULL,
    tag_id INT NOT NULL,
    PRIMARY KEY (feedback_id, tag_id),
    FOREIGN KEY (feedback_id) REFERENCES article_feedback(id) ON DELETE CASCADE,
    FOREIGN KEY (tag_id) REFERENCES feedback_tags(id) ON DELETE CASCADE
);
