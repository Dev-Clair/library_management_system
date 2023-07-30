<?php

declare(strict_types=1);

namespace app\Model;

class UserModel extends MainModel
{
    public function __construct(protected ?string $databaseName = null)
    {
        parent::__construct();
    }

    public function createUser(string $tableName = "users", array $sanitizedData): bool
    {
        if ($tableName !== "users") {
            throw new \InvalidArgumentException("Invalid table name specified; kindly omit or provide a valid table name.");
        }

        if (empty($sanitizedData)) {
            throw new \InvalidArgumentException("No data specified; kindly provide missing array argument.");
        }

        return $this->dbTableOp->createRecords(tableName: $tableName, sanitizedData: $sanitizedData);
    }

    public function retrieveAllUsers(string $tableName = "users"): array
    {
        if ($tableName !== "users") {
            throw new \InvalidArgumentException("Invalid table name specified; kindly omit or provide a valid table name.");
        }

        return $this->dbTableOp->retrieveAllRecords(tableName: $tableName);
    }

    public function retrieveSingleUser(string $tableName = "users", string $fieldName, mixed $fieldValue): array
    {
        if ($tableName !== "users") {
            throw new \InvalidArgumentException("Invalid table name specified; kindly omit or provide a valid table name.");
        }

        if (empty($fieldName)) {
            throw new \InvalidArgumentException("No field name specified; kindly provide reference field name.");
        }

        if (empty($fieldValue)) {
            throw new \InvalidArgumentException("No field value specified; kindly provide reference field value.");
        }

        return $this->dbTableOp->retrieveSingleRecord(tableName: $tableName, fieldName: $fieldName, fieldValue: $fieldValue);
    }

    public function validateUser(string $tableName = "users", string $fieldName, mixed $fieldValue): bool
    {
        if ($tableName !== "users") {
            throw new \InvalidArgumentException("Invalid table name specified; kindly omit or provide a valid table name.");
        }

        if (empty($fieldName)) {
            throw new \InvalidArgumentException("No field name specified; kindly provide reference field name.");
        }

        if (empty($fieldValue)) {
            throw new \InvalidArgumentException("No field value specified; kindly provide reference field value.");
        }

        return $this->dbTableOp->validateRecord(tableName: $tableName, fieldName: $fieldName, fieldValue: $fieldValue);
    }

    public function updateUser(string $tableName = "users", array $sanitizedData, string $fieldName, mixed $fieldValue): bool
    {
        if ($tableName !== "users") {
            throw new \InvalidArgumentException("Invalid table name specified; kindly omit or provide a valid table name.");
        }

        if (empty($sanitizedData)) {
            throw new \InvalidArgumentException("No data specified; kindly provide missing array argument.");
        }

        if (empty($fieldName)) {
            throw new \InvalidArgumentException("No field name specified; kindly provide reference field name.");
        }

        if (empty($fieldValue)) {
            throw new \InvalidArgumentException("No field value specified; kindly provide reference field value.");
        }

        return $this->dbTableOp->updateRecord(tableName: $tableName, sanitizedData: $sanitizedData, referenceFieldName: $fieldName, referenceFieldValue: $fieldValue);
    }

    public function deleteUser(string $tableName = "users", string $fieldName, mixed $fieldValue): bool
    {
        if ($tableName !== "users") {
            throw new \InvalidArgumentException("Invalid table name specified; kindly omit or provide a valid table name.");
        }

        if (empty($fieldName)) {
            throw new \InvalidArgumentException("No field name specified; kindly provide reference field name.");
        }

        if (empty($fieldValue)) {
            throw new \InvalidArgumentException("No field value specified; kindly provide reference field value.");
        }

        return $this->dbTableOp->deleteRecord(tableName: $tableName, fieldName: $fieldName, fieldValue: $fieldValue);
    }
}
