<?php

declare(strict_types=1);

namespace app\Model;

use db\DbResource;
use app\Model\AdminModel;

require __DIR__ . '/../../../vendor/autoload.php';


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

$sql_query = "CREATE DATABASE IF NOT EXISTS $databaseName";
// $sql_query = "DROP DATABASE $databaseName";

// if ($dbConn->query($sql_query)) {
//     echo "Database operation was successful";
// } else {
//     throw new \RuntimeException('Database operation failed');
// }

/** *************************************************************************************
 * 
 * Create Tables
 * 
 */
$tableName = "users";
$fieldNames = "
               `regNo.` INT(20) PRIMARY KEY NOT NULL,
               `studentName` VARCHAR(150) NOT NULL,
               `email` VARCHAR(150) UNIQUE NOT NULL,
               `courseName` VARCHAR() NOT NULL,
               `regDate` VARCHAR(50) NOT NULL,
               `gradDate` VARCHAR(50) NOT NULL,
               `datecreated` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP";

$databaseName = "libraryrecords";
$conn = new AdminModel(databaseName: $databaseName);
$status = $conn->createTable(tableName: $tableName, fieldNames: $fieldNames);
if ($status) {
    echo "Creating new $tableName in $databaseName returned: " . "true" . PHP_EOL;
} else {
    echo "Creating new $tableName in $databaseName returned: " . "false" . PHP_EOL;
}

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
$databaseName = "";
$tableName = "";
// $conn = new AdminModel(databaseName: $databaseName);
// $status = $conn->dropTable(tableName: $tableName);
// if ($status) {
//     echo "Deleting $tableName in $databaseName returned: " . "true" . PHP_EOL;
// } else {
//     echo "Deleting $tableName in $databaseName returned: " . "false" . PHP_EOL;
// }
