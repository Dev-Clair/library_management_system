<?php

declare(strict_types=1);

namespace app\Model;

class TransactionModel extends MainModel
{
    public function __construct(protected ?string $databaseName = null)
    {
        parent::__construct();
    }

    public function createTransaction(string $tableName = "transactions", array $sanitizedData): bool
    {
        if ($tableName !== "transactions") {
            throw new \InvalidArgumentException("Invalid table name specified; kindly omit or provide a valid table name.");
        }

        if (empty($sanitizedData)) {
            throw new \InvalidArgumentException("No data specified; kindly provide missing array argument.");
        }

        return $this->dbTableOp->createRecords(tableName: $tableName, sanitizedData: $sanitizedData);
    }

    public function retrieveAllTransactions(string $tableName = "transactions"): array
    {
        if ($tableName !== "transactions") {
            throw new \InvalidArgumentException("Invalid table name specified; kindly omit or provide a valid table name.");
        }

        return $this->dbTableOp->retrieveAllRecords(tableName: $tableName);
    }

    public function retrieveSingleTransaction(string $tableName = "transactions", string $fieldName, mixed $fieldValue): array
    {
        if ($tableName !== "transactions") {
            throw new \InvalidArgumentException("Invalid table name specified; kindly omit or provide a valid table name.");
        }

        if (empty($fieldName)) {
            throw new \InvalidArgumentException("No field name specified; kindly provide reference field name.");
        }

        if (empty($fieldValue)) {
            throw new \InvalidArgumentException("No field value specified; kindly provide reference field value.");
        }

        $fieldName = "`$fieldName`";

        return $this->dbTableOp->retrieveSingleRecord(tableName: $tableName, fieldName: $fieldName, fieldValue: $fieldValue);
    }

    public function validateTransaction(string $tableName = "transactions", string $fieldName, mixed $fieldValue): bool
    {
        if ($tableName !== "transactions") {
            throw new \InvalidArgumentException("Invalid table name specified; kindly omit or provide a valid table name.");
        }

        if (empty($fieldName)) {
            throw new \InvalidArgumentException("No field name specified; kindly provide reference field name.");
        }

        if (empty($fieldValue)) {
            throw new \InvalidArgumentException("No field value specified; kindly provide reference field value.");
        }

        $fieldName = "`$fieldName`";

        return $this->dbTableOp->validateRecord(tableName: $tableName, fieldName: $fieldName, fieldValue: $fieldValue);
    }

    public function updateTransaction(string $tableName = "transactions", array $sanitizedData, string $fieldName, mixed $fieldValue): bool
    {
        if ($tableName !== "transactions") {
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

        $fieldName = "`$fieldName`";

        return $this->dbTableOp->updateRecord(tableName: $tableName, sanitizedData: $sanitizedData, referenceFieldName: $fieldName, referenceFieldValue: $fieldValue);
    }

    public function deleteTransaction(string $tableName = "transactions", string $fieldName, mixed $fieldValue): bool
    {
        if ($tableName !== "transactions") {
            throw new \InvalidArgumentException("Invalid table name specified; kindly omit or provide a valid table name.");
        }

        if (empty($fieldName)) {
            throw new \InvalidArgumentException("No field name specified; kindly provide reference field name.");
        }

        if (empty($fieldValue)) {
            throw new \InvalidArgumentException("No field value specified; kindly provide reference field value.");
        }

        $fieldName = "`$fieldName`";

        return $this->dbTableOp->deleteRecord(tableName: $tableName, fieldName: $fieldName, fieldValue: $fieldValue);
    }
}
