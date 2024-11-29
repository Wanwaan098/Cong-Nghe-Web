-- Tạo cơ sở dữ liệu
CREATE DATABASE ProductDB;

-- Sử dụng cơ sở dữ liệu
USE ProductDB;

-- Tạo bảng sản phẩm
CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    price VARCHAR(50) NOT NULL
);

-- Thêm dữ liệu mẫu
INSERT INTO products (name, price) VALUES
('Sản phẩm 1', '1000 VND'),
('Sản phẩm 2', '2000 VND'),
('Sản phẩm 3', '3000 VND'),
('Sản phẩm 4', '5000 VND');
