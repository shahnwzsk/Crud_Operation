CREATE TABLE usermaster (
    id INT(10) AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(50) NOT NULL,
    lastname VARCHAR(50) NOT NULL,
    address VARCHAR(200) NOT NULL,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL,
    gender ENUM('M', 'F') NOT NULL,
    dob DATE NOT NULL,
    age INT(10) NOT NULL,
    zipcode VARCHAR(50) NOT NULL,
    mobileno VARCHAR(50) NOT NULL
);