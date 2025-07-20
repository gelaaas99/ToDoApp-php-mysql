CREATE DATABASE todoapp_db;

USE todoapp_db;

CREATE TABLE tasks (
    id INT PRIMARY KEY AUTO_INCREMENT, 
    title VARCHAR (255) NOT NULL,
    description TEXT,
    done BOOLEAN DEFAULT false, 
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);