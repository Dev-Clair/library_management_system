<?php

declare(strict_types=1);

namespace app\Model;

use db\DbResource;
use db\Connection\DbTableOp;

abstract class MainModel
{
    protected array $databaseNames = ['libraryOperations', 'libraryFinance', 'libraryRecords']; // Contains a list of all databases for the library
    protected ?string $databaseName;
    protected DbTableOp $dbTableOp;

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
}
