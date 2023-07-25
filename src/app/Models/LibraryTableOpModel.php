<?php

declare(strict_types=1);

namespace app\Model;

use db\DbResource;
use db\Connection\DbTableOp;

class LibraryTableOpModel
{
    private array $databaseNames = ['users', 'books', 'transactions']; // Contains a list of all database for the library
    private ?string $databaseName;
    private DbTableOp $dbTableOp;

    public function __construct(?string $databaseName = null)
    {
        // Check if the provided database name is valid
        if ($databaseName !== null && !in_array($databaseName, $this->databaseNames)) {
            throw new \InvalidArgumentException("Invalid database name provided.");
        }

        // Will use a custom database name if provided; otherwise, defaults to "null"
        $this->databaseName = $databaseName ?? $this->databaseName;

        // Obtains the DbTableOp connection object using DbResource
        $this->dbTableOp = DbResource::getTableOpConnection($this->databaseName);
    }

    public function createRecords(string $tableName, array $sanitizedData): bool
    {
        if ($tableName === "") {
            throw new \InvalidArgumentException("No table name specified; kindly provide a table name.");
        }

        if ($sanitizedData === "") {
            throw new \InvalidArgumentException("No data specified; kindly provide missing array argument.");
        }

        return $this->dbTableOp->createRecords(tableName: $tableName, sanitizedData: $sanitizedData);
    }

    public function retrieveAllRecords(string $tableName): array
    {
        if ($tableName === "") {
            throw new \InvalidArgumentException("No table name specified; kindly provide a table name.");
        }

        return $this->dbTableOp->retrieveAllRecords(tableName: $tableName);
    }

    public function retrieveSingleRecord(string $tableName, string $fieldName, mixed $fieldValue): array
    {
        if ($tableName === "") {
            throw new \InvalidArgumentException("No table name specified; kindly provide a table name.");
        }

        if ($fieldName === "") {
            throw new \InvalidArgumentException("No field name specified; kindly provide reference field name.");
        }

        if ($fieldValue === "") {
            throw new \InvalidArgumentException("No field value specified; kindly provide reference field value.");
        }

        return $this->dbTableOp->retrieveSingleRecord(tableName: $tableName, fieldName: $fieldName, fieldValue: $fieldValue);
    }

    public function validateRecord(string $tableName, string $fieldName, mixed $fieldValue): bool
    {
        if ($tableName === "") {
            throw new \InvalidArgumentException("No table name specified; kindly provide a table name.");
        }

        if ($fieldName === "") {
            throw new \InvalidArgumentException("No field name specified; kindly provide reference field name.");
        }

        if ($fieldValue === "") {
            throw new \InvalidArgumentException("No field value specified; kindly provide reference field value.");
        }

        return $this->dbTableOp->validateRecord(tableName: $tableName, fieldName: $fieldName, fieldValue: $fieldValue);
    }

    public function updateRecord(string $tableName, array $sanitizedData, string $fieldName, mixed $fieldValue): bool
    {
        if ($tableName === "") {
            throw new \InvalidArgumentException("No table name specified; kindly provide a table name.");
        }

        if ($sanitizedData === "") {
            throw new \InvalidArgumentException("No data specified; kindly provide missing array argument.");
        }

        if ($fieldName === "") {
            throw new \InvalidArgumentException("No field name specified; kindly provide reference field name.");
        }

        if ($fieldValue === "") {
            throw new \InvalidArgumentException("No field value specified; kindly provide reference field value.");
        }

        return $this->dbTableOp->updateRecord(tableName: $tableName, sanitizedData: $sanitizedData, referenceFieldName: $fieldName, referenceFieldValue: $fieldValue);
    }

    public function deleteRecord(string $tableName, string $fieldName, mixed $fieldValue): bool
    {
        if ($tableName === "") {
            throw new \InvalidArgumentException("No table name specified; kindly provide a table name.");
        }

        if ($fieldName === "") {
            throw new \InvalidArgumentException("No field name specified; kindly provide reference field name.");
        }

        if ($fieldValue === "") {
            throw new \InvalidArgumentException("No field value specified; kindly provide reference field value.");
        }

        return $this->dbTableOp->deleteRecord(tableName: $tableName, fieldName: $fieldName, fieldValue: $fieldValue);
    }
}
