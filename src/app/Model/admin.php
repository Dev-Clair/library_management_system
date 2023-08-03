<?php

declare(strict_types=1);

namespace app\Model;

use db\DbResource;
use app\Model\AdminModel;

require_once __DIR__ . '/../../../vendor/autoload.php';


/** *************************************************************************************
 * 
 * Create / Drop Databases
 * 
 */
$databaseNames = ['librarystaffs', 'libraryoperations', 'libraryfinance', 'libraryrecords'];
$databaseName = $databaseNames[3];
$dbConn = DbResource::dbConn($databaseName);

if (!$dbConn instanceof \PDO) {
    throw new \RuntimeException('Connection failed.');
}

// $sql_query = "CREATE DATABASE IF NOT EXISTS $databaseName";
$sql_query = "DROP DATABASE $databaseName";

// if ($dbConn->query($sql_query)) {
//     echo "Database operation was successful" . PHP_EOL;
// } else {
//     throw new \RuntimeException('Database operation failed' . PHP_EOL);
// }

/** *************************************************************************************
 * 
 * Create Tables
 * 
 * users
 *   "`User ID` INT PRIMARY KEY AUTO_INCREMENT,
 *   `First Name` VARCHAR(50) NOT NULL,
 *   `Last Name` VARCHAR(50) NOT NULL,
 *   `Email` VARCHAR(100) NOT NULL,
 *   `Phone Number` VARCHAR(20),
 *   `Address` VARCHAR(255),
 *   `Date of Birth` DATE,
 *   `Registration Date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
 *   `Status` ENUM('Active', 'Inactive') DEFAULT 'Active',
 *   `Membership Expiry Date` DATE";
 * 
 * transactions
 * "`Transaction ID` INT PRIMARY KEY AUTO_INCREMENT,
 *   `User ID` INT,
 *   `Book ID` INT,
 *   `Transaction Type` ENUM('Borrow', 'Return'),
 *   `Transaction Date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
 *   `Due Date` DATE,
 *  `Return Date` DATE,
 *  `Fine Amount` DECIMAL(10, 2),
 *   `Additional Notes` TEXT,
 *  FOREIGN KEY (`User ID`) REFERENCES `users`(`User ID`),
 *   FOREIGN KEY (`Book ID`) REFERENCES `books`(`Book ID`)";
 */
$tableName = "books";
$fieldNames = "    `Book ID` INT PRIMARY KEY AUTO_INCREMENT,
                    `Title` VARCHAR(100) NOT NULL,
                    `Author` VARCHAR(150) NOT NULL,
                    `ISBN` VARCHAR(20),
                    `Edition` VARCHAR(100) NOT NULL,
                    `No. Per Edition` INT NOT NULL,
                    `Library Section` VARCHAR(100) NOT NULL,
                    `Borrowability Status` ENUM('Borrowable', 'Reference Only') NOT NULL,
                    `Publication Year` INT(4),
                    `Publisher` VARCHAR(100),
                    `Genre` VARCHAR(50),
                    `Language` VARCHAR(50),
                    `Description` TEXT,
                    `Available Copies` INT,
                    `Cover Image URL` VARCHAR(255)";

$databaseName = "libraryrecords";
// $conn = new AdminModel(databaseName: $databaseName);
// $status = $conn->createTable(tableName: $tableName, fieldNames: $fieldNames);
// if ($status) {
//     echo "Creating new table `$tableName` in $databaseName returned: " . "true" . PHP_EOL;
// } else {
//     echo "Creating new table `$tableName` in $databaseName returned: " . "false" . PHP_EOL;
// }

/** *************************************************************************************
 * 
 * Alter Tables
 * 
 */
$databaseName = "";
$tableName = "";
$alterStatement = "ADD COLUMN ``  NOT NULL FIRST";
// $conn = new AdminModel(databaseName: $databaseName);
// $status = $conn->alterTable(tableName: $tableName, alterStatement: $alterStatement);
// if ($status) {
//     echo "Modifying $tableName table in $databaseName returned: " . "true" . PHP_EOL;
// } else {
//     echo "Modifying $tableName table in $databaseName returned: " . "false" . PHP_EOL;
// }

/** *************************************************************************************
 * 
 * Truncate Tables
 * 
 */
$databaseName = "";
$tableName = "";
// $conn = new AdminModel(databaseName: $databaseName);
// $status = $conn->truncateTable(tableName: $tableName);
// if ($status) {
//     echo "Clearing all $tableName records in $databaseName returned: " . "true" . PHP_EOL;
// } else {
//     echo "Clearing all $tableName records in $databaseName returned: " . "false" . PHP_EOL;
// }

/** *************************************************************************************
 * 
 * Drop Tables
 * 
 */
$databaseName = "libraryrecords";
$tableName = "transactions";
// $conn = new AdminModel(databaseName: $databaseName);
// $status = $conn->dropTable(tableName: $tableName);
// if ($status) {
//     echo "Deleting table `$tableName` in $databaseName returned: " . "true" . PHP_EOL;
// } else {
//     echo "Deleting table `$tableName` in $databaseName returned: " . "false" . PHP_EOL;
// }
