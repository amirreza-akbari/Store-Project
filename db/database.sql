CREATE DATABASE IF NOT EXISTS laboratory_db;
USE laboratory_db;


CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    full_name VARCHAR(100),
    national_code VARCHAR(10) UNIQUE NOT NULL,
    phone VARCHAR(11) UNIQUE NOT NULL,
    role ENUM('admin', 'user') DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE test_results (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    wbc DECIMAL(5,2),
    rbc DECIMAL(5,2),
    hemoglobin DECIMAL(5,2),
    hematocrit DECIMAL(5,2),
    platelets DECIMAL(6,2),
    fbs DECIMAL(5,2),
    cholesterol DECIMAL(5,2),
    triglyceride DECIMAL(5,2),
    hdl DECIMAL(5,2),
    ldl DECIMAL(5,2),
    bun DECIMAL(5,2),
    creatinine DECIMAL(5,2),
    alt DECIMAL(5,2),
    ast DECIMAL(5,2),
    alp DECIMAL(5,2),
    bilirubin DECIMAL(5,2),
    tsh DECIMAL(5,2),
    vitamin_d DECIMAL(5,2),
    iron DECIMAL(5,2),
    ferritin DECIMAL(5,2),
    test_date DATE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);


INSERT INTO users (username, password, full_name, national_code, phone, role) 
VALUES ('admin', MD5('admin123'), 'مدیر سیستم', '1234567890', '09123456789', 'admin');

INSERT INTO users (username, password, full_name, national_code, phone, role) 
VALUES ('user1', MD5('user123'), 'علی محمدی', '9876543210', '09129876543', 'user');