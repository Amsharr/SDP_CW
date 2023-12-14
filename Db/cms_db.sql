-- Create Institutions Table
CREATE TABLE institutions (
    institutionId INT PRIMARY KEY,
    type VARCHAR(50) NOT NULL,
    name VARCHAR(255) NOT NULL
);

-- Create Complainers Table
CREATE TABLE complainers (
    userId INT PRIMARY KEY AUTO_INCREMENT,
    firstName VARCHAR(255) NOT NULL,
    lastName VARCHAR(255) NOT NULL,
    contactNo VARCHAR(20),
    email VARCHAR(255) NOT NULL,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
);

-- Create Complains Table
CREATE TABLE complains (
    complainId INT PRIMARY KEY AUTO_INCREMENT,
    userId INT NOT NULL,
    institutionId INT NOT NULL,
    Description TEXT NOT NULL,
    status VARCHAR(50) NOT NULL,
    dateTime DATETIME NOT NULL,
    FOREIGN KEY (userId) REFERENCES complainers(userId),
    FOREIGN KEY (institutionId) REFERENCES institutions(institutionId)
);

-- Create AreaOfficers Table
CREATE TABLE areaOfficers (
    officerId INT PRIMARY KEY AUTO_INCREMENT,
    firstName VARCHAR(255) NOT NULL,
    lastName VARCHAR(255) NOT NULL,
    role VARCHAR(50) NOT NULL,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    instituitionId INT NOT NULL,
    FOREIGN KEY (instituitionId) REFERENCES institutions(institutionId)
);

-- Create InvestigationOfficers Table
CREATE TABLE investigationOfficers (
    officerId INT PRIMARY KEY AUTO_INCREMENT,
    firstName VARCHAR(255) NOT NULL,
    lastName VARCHAR(255) NOT NULL,
    role VARCHAR(50) NOT NULL,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    instituitionId INT NOT NULL,
    FOREIGN KEY (instituitionId) REFERENCES institutions(institutionId)
);

-- Create SystemAdmin Table
CREATE TABLE systemAdmin (
    systemAdminId INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
);
