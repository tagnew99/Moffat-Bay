-- Create database
CREATE DATABASE IF NOT EXISTS MoffatBayLodge;

-- Use the database
USE MoffatBayLodge;

-- Create user table
CREATE TABLE Users (
    UserID INT PRIMARY KEY AUTO_INCREMENT,
    Username VARCHAR(50) UNIQUE NOT NULL,
    Password VARCHAR(100) NOT NULL,
    Email VARCHAR(100) UNIQUE NOT NULL,
    Age INT,
    Address VARCHAR(255),
    RegistrationDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create room types table
CREATE TABLE RoomTypes (
    RoomTypeID INT PRIMARY KEY AUTO_INCREMENT,
    TypeName VARCHAR(50) UNIQUE NOT NULL,
    Description TEXT
);

-- Create rooms table
CREATE TABLE Rooms (
    RoomID INT PRIMARY KEY AUTO_INCREMENT,
    RoomNumber VARCHAR(20) UNIQUE NOT NULL,
    RoomTypeID INT,
    FOREIGN KEY (RoomTypeID) REFERENCES RoomTypes(RoomTypeID)
);

-- Create activities table
CREATE TABLE Activities (
    ActivityID INT PRIMARY KEY AUTO_INCREMENT,
    ActivityName VARCHAR(100) UNIQUE NOT NULL,
    Description TEXT
);

-- Create bookings table
CREATE TABLE Bookings (
    BookingID INT PRIMARY KEY AUTO_INCREMENT,
    UserID INT,
    RoomID INT,
    ActivityID INT,
    CheckInDate DATE NOT NULL,
    CheckOutDate DATE NOT NULL,
    TotalPrice DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (UserID) REFERENCES Users(UserID),
    FOREIGN KEY (RoomID) REFERENCES Rooms(RoomID),
    FOREIGN KEY (ActivityID) REFERENCES Activities(ActivityID)
);

-- Create confirmations table
CREATE TABLE Confirmations (
    ConfirmationID INT PRIMARY KEY AUTO_INCREMENT,
    UserID INT,
    ConfirmationCode VARCHAR(100) UNIQUE NOT NULL,
    ConfirmationStatus BOOLEAN DEFAULT FALSE,
    FOREIGN KEY (UserID) REFERENCES Users(UserID)
);

-- Create billing table
CREATE TABLE Billing (
    BillingID INT PRIMARY KEY AUTO_INCREMENT,
    UserID INT,
    BillingAddress VARCHAR(255) NOT NULL,
    CreditCardNumber VARCHAR(20) NOT NULL,
    ExpiryDate DATE NOT NULL,
    CVV VARCHAR(4) NOT NULL,
    FOREIGN KEY (UserID) REFERENCES Users(UserID)
);

-- Create logs table
CREATE TABLE Logs (
    LogID INT PRIMARY KEY AUTO_INCREMENT,
    LogTime TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    UserID INT,
    Action VARCHAR(255) NOT NULL,
    FOREIGN KEY (UserID) REFERENCES Users(UserID)
);

-- Create user with username "admin" and password "password"
CREATE USER IF NOT EXISTS 'admin'@'localhost' IDENTIFIED BY 'password';

-- Grant privileges to the user
GRANT ALL PRIVILEGES ON MoffatBayLodge.* TO 'admin'@'localhost';

-- Flush privileges
FLUSH PRIVILEGES;
