<?php

declare(strict_types=1);

use app\Model\AdminModel;
use app\Model\MainModel;
use app\Model\UserModel;
// use app\Model\BookModel;
// use app\Model\TransactionModel;

require __DIR__ . '/../vendor/autoload.php';

/** *******************************************Create Tables***************************************** */
/** ******* Create Table*******/
$tableName = "";
$fieldNames = "`` VARCHAR() PRIMARY KEY NOT NULL,
               `` VARCHAR() NOT NULL,
               `` VARCHAR() NOT NULL,
               `` INT() NOT NULL,
               `datecreated` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP";

$databaseName = "";
$conn = new AdminModel(databaseName: $databaseName);
$result = $conn->createTable(tableName: $tableName, fieldNames: $fieldNames);
echo "Creating table $tableName: ";
if ($result) {
    echo "Success" . PHP_EOL;
} else {
    echo "Failure" . PHP_EOL;
}

/** Add Record to Table */
$newRecord = []; // Record must be passed as an associative array
$tableName = "";
$databaseName = "";
$conn = new UserModel(databaseName: $databaseName);
$result = $conn->createUser(tableName: $tableName, sanitizedData: $newRecord);
echo "Creating new record in $tableName: ";
if ($result) {
    echo "Success" . PHP_EOL;
} else {
    echo "Failure" . PHP_EOL;
}

/** Validate Record */
$fieldName = "";
$fieldValue = "";

$tableName = "";
$databaseName = "";
$conn = new UserModel(databaseName: $databaseName);
$result = $conn->validateUser(tableName: $tableName, fieldName: $fieldName, fieldValue: $fieldValue);
echo "Validating record in $tableName returns: $result" . PHP_EOL;

/** Retrieve All Table Records */
$tableName = "";
$databaseName = "";
$conn = new UserModel(databaseName: $databaseName);
$result = $conn->retrieveAllUsers(tableName: $tableName);
echo "Retrieving all records in $tableName: " . PHP_EOL;
var_dump($result);

/** Retrieve Single Value from Table Records */
$fieldName = "";
$fieldValue = "";

$tableName = "";
$databaseName = "";
$conn = new UserModel(databaseName: $databaseName);
$result = $conn->retrieveSingleUser(tableName: $tableName, fieldName: $fieldName, fieldValue: $fieldValue);
echo "Retrieving single value in $tableName: " . PHP_EOL;
var_dump($result);

/** Retrieve Multiple FieldValues from Table Record */
$fieldName = "";
$compareFieldName = "";
$compareFieldValue = "";

$tableName = "";
$databaseName = "";
// $conn = new UserModel(databaseName: $databaseName);
// $result = $conn->retrieveMultipleUser(tableName: $tableName, fieldName: $fieldName, compareFieldName: $compareFieldName, compareFieldValue: $compareFieldValue);
// echo "Retrieving multple values from $tableName: " . PHP_EOL;
// var_dump($result);

/** Retrieve Single Table Record */
$fieldName = "";
$fieldValue = "";

$tableName = "";
$databaseName = "";
$conn = new UserModel(databaseName: $databaseName);
$result = $conn->retrieveSingleUser(tableName: $tableName, fieldName: $fieldName, fieldValue: $fieldValue);
echo "Retrieving single record in $tableName: " . PHP_EOL;
var_dump($result);

/** Update Table Record */
$record = []; // Record must be passed as an associative array
$fieldName = "";
$fieldValue = "";

$tableName = "";
$databaseName = "";
$conn = new UserModel(databaseName: $databaseName);
$result = $conn->updateUser(tableName: $tableName, sanitizedData: $record, fieldName: $fieldName, fieldValue: $fieldValue);
echo "Updating record in $tableName: ";
if ($result) {
    echo "Success" . PHP_EOL;
} else {
    echo "Failure" . PHP_EOL;
}

/** Delete Table Record */
$fieldName = "";
$fieldValue = "";

$tableName = "";
$databaseName = "";
$conn = new UserModel(databaseName: $databaseName);
$result = $conn->deleteUser(tableName: $tableName, fieldName: $fieldName, fieldValue: $fieldValue);
echo "Deleting record in $tableName: ";
if ($result) {
    echo "Success" . PHP_EOL;
} else {
    echo "Failure" . PHP_EOL;
}

/** *******************************************Alter Tables***************************************** */
$databaseName = "";
$tableName = "";
$alterStatement = "ADD COLUMN ``  NOT NULL FIRST";
$conn = new AdminModel(databaseName: $databaseName);
$result = $conn->alterTable(tableName: $tableName, alterStatement: $alterStatement);


/** *******************************************Truncate Tables***************************************** */
$databaseName = "";
$tableName = "";
$conn = new AdminModel(databaseName: $databaseName);
$result = $conn->truncateTable(tableName: $tableName);

/** *******************************************Drop Tables***************************************** */
$databaseName = "";
$tableName = "";
$conn = new AdminModel(databaseName: $databaseName);
$result = $conn->dropTable(tableName: $tableName);
