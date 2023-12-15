-- Create Table: institutions
CREATE TABLE institutions (
    institutionId INT PRIMARY KEY,
    type VARCHAR(255) NOT NULL
);

-- Create Table: complainers
CREATE TABLE complainers (
    userId INT AUTO_INCREMENT PRIMARY KEY,
    firstName VARCHAR(255) NOT NULL,
    lastName VARCHAR(255) NOT NULL,
    address VARCHAR(255) NOT NULL,
    contactNo VARCHAR(15) NOT NULL,
    email VARCHAR(255) NOT NULL,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);

-- Create Table: complaints
CREATE TABLE complaints (
    complaintId INT AUTO_INCREMENT PRIMARY KEY,
    userId INT,
    complainerFirstName VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    location VARCHAR(255) NOT NULL,
    status VARCHAR(255) DEFAULT 'open',
    date DATE NOT NULL,
    FOREIGN KEY (userId) REFERENCES complainers(userId),
    CONSTRAINT FK_complaints_complainers
        FOREIGN KEY (userId)
        REFERENCES complainers(userId)
);

-- Create Table: areaOfficers
CREATE TABLE areaOfficers (
    officerId INT AUTO_INCREMENT PRIMARY KEY,
    instituitionId INT,
    firstName VARCHAR(255) NOT NULL,
    lastName VARCHAR(255) NOT NULL,
    contactNo VARCHAR(15) NOT NULL,
    position VARCHAR(255) NOT NULL,
    FOREIGN KEY (instituitionId) REFERENCES institutions(institutionId)
);

-- Create Table: investigationOfficers
CREATE TABLE investigationOfficers (
    officerId INT AUTO_INCREMENT PRIMARY KEY,
    firstName VARCHAR(255) NOT NULL,
    lastName VARCHAR(255) NOT NULL,
    contactNo VARCHAR(15) NOT NULL,
    position VARCHAR(255) NOT NULL,
    instituitionId INT,
    FOREIGN KEY (instituitionId) REFERENCES institutions(institutionId)
);

-- Create Table: systemAdmin
CREATE TABLE systemAdmin (
    systemAdminId INT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE currentComplaints (
    complaintId INT,
    officerId INT,
    description TEXT NOT NULL,
    date DATE NOT NULL,
    status VARCHAR(255) DEFAULT 'open',
    investigatorRemarks TEXT,
    FOREIGN KEY (complaintId) REFERENCES complaints(complaintId),
    FOREIGN KEY (officerId) REFERENCES investigationOfficers(officerId)
);

-- Create Table: complaintRemark
CREATE TABLE complaintRemark (
    Id INT AUTO_INCREMENT PRIMARY KEY,
    complainNumber INT,
    status VARCHAR(255) NOT NULL,
    remark TEXT NOT NULL,
    remarkDate DATE NOT NULL
);

SELECT
    cc.complaintId,
    cc.officerId,
    c.description AS complaintDescription,
    c.status AS complaintStatus,
    c.date AS complaintDate,
    cc.date AS currentComplaintDate,
    cc.status AS currentComplaintStatus,
    cc.investigatorRemarks
FROM
    currentComplaints cc
JOIN
    complaints c ON cc.complaintId = c.complaintId;

