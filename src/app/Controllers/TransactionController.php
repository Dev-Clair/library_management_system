<?php

declare(strict_types=1);

namespace app\Controller;

use app\Model\LibraryTableOpModel;
use app\Controller\Controller;

class TransactionController extends Controller
{
    public function index()
    {
        /**
         * Logic to retrieve transactions and pass them to the view
         * Renders the view for listing transactions
         */
        $transactionModel = new LibraryTableOpModel("transactions");
        $transactions = $transactionModel->retrieveAllRecords("transactions");

        // Render the view for displaying transactions
        include 'views/transaction/index.php';
    }

    public function create()
    {
        /**
         * Logic for creating a new transaction.
         * Shows a form to create a new transaction.
         * Renders the view (views/transaction/create.php) that contains the HTML form to collect transaction information
         */
        include 'views/transaction/create.php';
    }

    public function store()
    {
        /**
         * Logic to store the newly created transaction in the database.
         * Processing the data submitted through the create form.
         * Handles data validation, and stores the new transaction in the database using the transactionModel.
         * Redirect back to the index page with success message
         */
    }

    public function edit()
    {
        /** 
         * Logic to store the newly created transaction in the database
         * Shows a form to edit an existing transaction's information.
         * Retrieves the transaction information from the transactionModel based on the transaction details provided in the URL.
         * Renders the view (views/transaction/edit.php) containing the edit form, and pre-fills the form fields with the transaction's current information
         * Redirect back to the index page with success message
         */
    }

    public function update()
    {
        /**
         * Logic to store the newly created transaction in the database.
         * Processes the data submitted through the edit form.
         * Handles data validation, and updates the transaction's information in the database using the transactionModel
         * Redirect back to the index page with success message
         */
    }

    public function delete()

    {
        /**
         * Logic for deleting transaction.
         * Handles the action to delete a transaction from the system.
         * Retrieves the transaction information through the URL and delete the transaction from the database using the transactionModel.
         * Redirects to index with success message
         */
    }
}
