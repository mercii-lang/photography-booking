-- Active: 1753950191628@@127.0.0.1@3306@photography_booking
-- Photography Booking System Database Schema

CREATE DATABASE IF NOT EXISTS photography_booking;
USE photography_booking;

-- Users table
CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('client', 'photographer', 'admin') NOT NULL,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    phone VARCHAR(20),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Photographers table
CREATE TABLE photographers (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    bio TEXT,
    location VARCHAR(255),
    specialties VARCHAR(255),
    hourly_rate DECIMAL(10,2),
    experience_years INT,
    portfolio_url VARCHAR(255),
    rating DECIMAL(3,2) DEFAULT 0,
    review_count INT DEFAULT 0,
    is_available BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- Clients table
CREATE TABLE clients (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    company_name VARCHAR(255),
    preferences TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- Bookings table
CREATE TABLE bookings (
    id INT PRIMARY KEY AUTO_INCREMENT,
    client_id INT NOT NULL,
    photographer_id INT NOT NULL,
    event_type VARCHAR(100) NOT NULL,
    event_date DATE NOT NULL,
    event_time TIME,
    location VARCHAR(255),
    budget DECIMAL(10,2),
    description TEXT,
    status ENUM('pending', 'confirmed', 'in_progress', 'completed', 'cancelled') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (client_id) REFERENCES clients(id) ON DELETE CASCADE,
    FOREIGN KEY (photographer_id) REFERENCES photographers(id) ON DELETE CASCADE
);

-- Portfolio table
CREATE TABLE portfolios (
    id INT PRIMARY KEY AUTO_INCREMENT,
    photographer_id INT NOT NULL,
    title VARCHAR(255) NOT NULL,
    image_path VARCHAR(255) NOT NULL,
    category VARCHAR(100),
    description TEXT,
    is_featured BOOLEAN DEFAULT FALSE,
    likes INT DEFAULT 0,
    views INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (photographer_id) REFERENCES photographers(id) ON DELETE CASCADE
);

-- Payments table
CREATE TABLE payments (
    id INT PRIMARY KEY AUTO_INCREMENT,
    booking_id INT NOT NULL,
    amount DECIMAL(10,2) NOT NULL,
    status ENUM('pending', 'completed', 'failed', 'refunded') DEFAULT 'pending',
    payment_method VARCHAR(50),
    transaction_id VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (booking_id) REFERENCES bookings(id) ON DELETE CASCADE
);

-- Reviews table
CREATE TABLE reviews (
    id INT PRIMARY KEY AUTO_INCREMENT,
    booking_id INT NOT NULL,
    reviewer_id INT NOT NULL,
    reviewee_id INT NOT NULL,
    rating INT NOT NULL CHECK (rating >= 1 AND rating <= 5),
    comment TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (booking_id) REFERENCES bookings(id) ON DELETE CASCADE,
    FOREIGN KEY (reviewer_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (reviewee_id) REFERENCES users(id) ON DELETE CASCADE
);

-- Sample data
INSERT INTO users (email, password, role, first_name, last_name, phone) VALUES
('admin@photobooking.com', '$2y$10$hashedpassword', 'admin', 'System', 'Admin', '1234567890'),
('john@client.com', '$2y$10$hashedpassword', 'client', 'John', 'Doe', '0987654321'),
('sarah@photographer.com', '$2y$10$hashedpassword', 'photographer', 'Sarah', 'Chen', '1122334455');

-- Get user IDs for foreign keys
SET @admin_id = (SELECT id FROM users WHERE email = 'admin@photobooking.com');
SET @client_id = (SELECT id FROM users WHERE email = 'john@client.com');
SET @photographer_id = (SELECT id FROM users WHERE email = 'sarah@photographer.com');

INSERT INTO clients (user_id, preferences) VALUES (@client_id, 'Natural, candid shots');

INSERT INTO photographers (user_id, bio, location, specialties, hourly_rate, experience_years) VALUES
(@photographer_id, 'Professional wedding and portrait photographer', 'New York, NY', 'Wedding,Portrait,Event', 200.00, 8);
