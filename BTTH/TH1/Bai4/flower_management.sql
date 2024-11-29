CREATE DATABASE flower_management;
USE flower_management;
CREATE TABLE flowers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    image VARCHAR(255) NOT NULL
);INSERT INTO flowers (name, description, image) VALUES
("Hoa Đỗ Quyên", "Loài hoa mang vẻ đẹp sang trọng, thường nở vào dịp Xuân.", "./images/doquyen.jpg"),
("Hoa Hải Đường", "Biểu tượng của sự giàu sang, thịnh vượng.", "./images/haiduong.jpg"),
("Hoa Mai", "Đại diện cho mùa xuân ở miền Nam, thường trưng vào dịp tết", "./images/mai.jpg"),
("Hoa Tường Vy", "Vẻ đẹp dịu dàng, thường nở vào mùa hè.", "./images/tuongvy.jpg");

