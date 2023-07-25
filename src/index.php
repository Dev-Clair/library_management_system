<?php

declare(strict_types=1);

use db\DbResource;

require __DIR__ . '/../vendor/autoload.php';
// require __DIR__ . '/../src/db/dbResource.php'; // Without MVC

$databaseName = "";
// $conn =tableConnection(databaseName: $databaseName);  // Without MVC
$conn = DbResource::getTableConnection(databaseName: $databaseName);
var_dump($conn);
