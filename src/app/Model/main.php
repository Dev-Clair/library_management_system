<?php

declare(strict_types=1);

namespace app\Model;

use app\Model\UserModel;
// use app\Model\BookModel;
// use app\Model\TransactionModel;

require __DIR__ . '/../../vendor/autoload.php';


/** *************************************************************************************
 * 
 * Add Record to Table
 * 
 */
$userID = time();
$newRecord = [
    "User ID" => $userID,
    "First Name" => "Wendy",
    "Last Name" => "Aniogbu",
    "Email" => "aniogbu.wendy@yahoo.com",
    "Phone Number" => "09150515435",
    "Address" => "C94, C6 Street Nicon Town Estate",
    "Date of Birth" => "2001-03-24",
    "Membership Expiry Date" => "2024-08-18"
]; // Record must be passed as an associative array
$tableName = "users";
$databaseName = "libraryrecords";
// $conn = new UserModel(databaseName: $databaseName);
// $status = $conn->createUser(tableName: $tableName, sanitizedData: $newRecord);
// if ($status) {
//     echo "Creating new record in $tableName returned: " . "true" . PHP_EOL;
// } else {
//     echo "Creating new record in $tableName returned: " . "false" . PHP_EOL;
// }

/** *************************************************************************************
 * 
 * Validate Record
 * 
 */
$fieldName = "";
$fieldValue = "";

$tableName = "";
$databaseName = "";
// $conn = new UserModel(databaseName: $databaseName);
// $status = $conn->validateUser(tableName: $tableName, fieldName: $fieldName, fieldValue: $fieldValue);
// if ($status) {
//     echo "Validating record in $tableName returned: " . "true" . PHP_EOL;
// } else {
//     echo "Validating record in $tableName returned: " . "false" . PHP_EOL;
// }

/** *************************************************************************************
 * 
 * Retrieve All Table Records
 * 
 */
$tableName = "";
$databaseName = "";
// $conn = new UserModel(databaseName: $databaseName);
// $result = $conn->retrieveAllUsers(tableName: $tableName);
// echo "Retrieving all records in $tableName: " . PHP_EOL;
// var_dump($result);

/** *************************************************************************************
 * 
 * Retrieve Single Value from Table Records
 * 
 */
$fieldName = "";
$fieldValue = "";

$tableName = "";
$databaseName = "";
// $conn = new UserModel(databaseName: $databaseName);
// $result = $conn->retrieveSingleUser(tableName: $tableName, fieldName: $fieldName, fieldValue: $fieldValue);
// echo "Retrieving single user in $tableName: " . PHP_EOL;
// var_dump($result);

/** *************************************************************************************
 * 
 * Retrieve Multiple FieldValues from Table Record
 * 
 */
$fieldName = "";
$compareFieldName = "";
$compareFieldValue = "";

$tableName = "";
$databaseName = "";
// $conn = new UserModel(databaseName: $databaseName);
// $result = $conn->retrieveMultipleUser(tableName: $tableName, fieldName: $fieldName, compareFieldName: $compareFieldName, compareFieldValue: $compareFieldValue);
// echo "Retrieving multple values from $tableName: " . PHP_EOL;
// var_dump($result);

/** *************************************************************************************
 * 
 * Retrieve Single Table Record
 * 
 */
$fieldName = "";
$fieldValue = "";

$tableName = "";
$databaseName = "";
// $conn = new UserModel(databaseName: $databaseName);
// $result = $conn->retrieveSingleUser(tableName: $tableName, fieldName: $fieldName, fieldValue: $fieldValue);
// echo "Retrieving single record in $tableName: " . PHP_EOL;
// var_dump($result);

/** *************************************************************************************
 * 
 * Update Table Record
 * 
 */
$record = [
    "Date of Birth" => "1995-05-17",
    "Membership Expiry Date" => "2025-07-20"
]; // Record must be passed as an associative array
$fieldName = "Email";
$fieldValue = "aniogbu.samuel@yahoo.com";

$tableName = "users";
$databaseName = "libraryrecords";
// $conn = new UserModel(databaseName: $databaseName);
// $status = $conn->updateUser(tableName: $tableName, sanitizedData: $record, fieldName: $fieldName, fieldValue: $fieldValue);
// if ($status) {
//     echo "Updating record in $tableName returned: " . "true" . PHP_EOL;
// } else {
//     echo "Updating record in $tableName returned: " . "false" . PHP_EOL;
// }

/** *************************************************************************************
 * 
 * Delete Table Record
 * 
 */
$fieldName = "";
$fieldValue = "";

$tableName = "";
$databaseName = "";
// $conn = new UserModel(databaseName: $databaseName);
// $status = $conn->deleteUser(tableName: $tableName, fieldName: $fieldName, fieldValue: $fieldValue);
// if ($status) {
//     echo "Deleting record in $tableName returned: " . "true" . PHP_EOL;
// } else {
//     echo "Deleting record in $tableName returned: " . "false" . PHP_EOL;
// }
