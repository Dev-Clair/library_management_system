<?php

declare(strict_types=1);

use Dotenv\Dotenv;
use db\Connection\DbConn;
use db\Connection\DbTable;
use db\Connection\DbTableOp;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../..');
$dotenv->load();

/******* Create/Drop/Truncate/Alter Table ******/
function tableConnection(string $databaseName): DbTable
{
    $conn = new DbConn(driver: $_ENV["DSN_DRIVER"], serverName: $_ENV["DATABASE_HOSTNAME"], userName: $_ENV["DATABASE_USERNAME"], password: $_ENV["DATABASE_PASSWORD"], database: $databaseName);
    $conn = new DbTable($conn->getConnection());
    return $conn;
}

/******* Table Read and Write Operations ******/
function tableOpConnection(string $databaseName): DbTableOp
{
    $conn = new DbConn(driver: $_ENV["DSN_DRIVER"], serverName: $_ENV["DATABASE_HOSTNAME"], userName: $_ENV["DATABASE_USERNAME"], password: $_ENV["DATABASE_PASSWORD"], database: $databaseName);
    $conn = new DbTableOp($conn->getConnection());
    return $conn;
}
