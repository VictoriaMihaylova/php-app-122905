CREATE DATABASE grooming;
USE grooming;

CREATE TABLE services (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    small_price DECIMAL(10, 2),
    medium_price DECIMAL(10, 2),
    large_price DECIMAL(10, 2),
    extra_large_price DECIMAL(10, 2),
    image_path VARCHAR(255)
);
