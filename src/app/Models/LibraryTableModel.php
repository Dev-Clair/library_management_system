<?php

declare(strict_types=1);

namespace app\Model;

use db\DbResource;
use db\Connection\DbTable;

class LibraryTableOpModel
{
    private array $databaseNames = ['users', 'books', 'transactions']; // Contains a list of all database for the library
    private ?string $databaseName;
    private DbTable $dbTable;

    public function __construct(?string $databaseName = null)
    {
        // Check if the provided database name is valid
        if ($databaseName !== null && !in_array($databaseName, $this->databaseNames)) {
            throw new \InvalidArgumentException("Invalid database name provided.");
        }

        // Will use a custom database name if provided; otherwise, defaults to "null"
        $this->databaseName = $databaseName ?? $this->databaseName;

        // Obtains the DbTableOp connection object using DbResource
        $this->dbTable = DbResource::getTableConnection($this->databaseName);
    }

    public function createtable(string $tableName, string $fieldNames): bool
    {
        if ($tableName === "") {
            throw new \InvalidArgumentException("No table name specified; kindly provide a table name.");
        }

        if ($fieldNames === "") {
            throw new \InvalidArgumentException("No field names specified; kindly provide fieldnames required.");
        }

        return $this->dbTable->createTable(tableName: $tableName, fieldNames: $fieldNames);
    }

    public function alterTable(string $tableName, string $alterStatement): bool
    {
        if ($tableName === "") {
            throw new \InvalidArgumentException("No table name specified; kindly provide a table name.");
        }

        if ($alterStatement === "") {
            throw new \InvalidArgumentException("No alter statement specified; kindly provide change required.");
        }

        return $this->dbTable->alterTable(tableName: $tableName, alterStatement: $alterStatement);
    }

    public function truncateTable(string $tableName): bool
    {
        if ($tableName === "") {
            throw new \InvalidArgumentException("No table name specified; kindly provide a table name.");
        }

        return $this->dbTable->truncateTable(tableName: $tableName);
    }

    public function dropTable(string $tableName): bool
    {
        if ($tableName === "") {
            throw new \InvalidArgumentException("No table name specified; kindly provide a table name.");
        }

        return $this->dbTable->dropTable(tableName: $tableName);
    }
}
