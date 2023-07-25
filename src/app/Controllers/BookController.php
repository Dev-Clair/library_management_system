<?php

declare(strict_types=1);

namespace app\Controller;

use app\Model\LibraryTableOpModel;
use app\Controller\Controller;

class BookController extends Controller
{
    public function index()
    {
        /**
         * Logic to retrieve books and pass them to the view
         * Renders the view for listing books
         */
        $bookModel = new LibraryTableOpModel("books");
        $books = $bookModel->retrieveAllRecords("books");

        // Render the view for displaying books
        include 'views/book/index.php';
    }

    public function create()
    {
        /**
         * Logic for creating a new book.
         * Shows a form to create a new book.
         * Renders the view (views/book/create.php) that contains the HTML form to collect book information
         */
        include 'views/book/create.php';
    }

    public function store()
    {
        /**
         * Logic to store the newly created book in the database.
         * Processing the data submitted through the create form.
         * Handles data validation, and stores the new book in the database using the bookModel.
         * Redirect back to the index page with success message
         */
    }

    public function edit()
    {
        /** 
         * Logic to store the newly created book in the database
         * Shows a form to edit an existing book's information.
         * Retrieves the book information from the bookModel based on the book details provided in the URL.
         * Renders the view (views/book/edit.php) containing the edit form, and pre-fills the form fields with the book's current information
         * Redirect back to the index page with success message
         */
    }

    public function update()
    {
        /**
         * Logic to store the newly created book in the database.
         * Processes the data submitted through the edit form.
         * Handles data validation, and updates the book's information in the database using the bookModel
         * Redirect back to the index page with success message
         */
    }

    public function delete()

    {
        /**
         * Logic for deleting book.
         * Handles the action to delete a book from the system.
         * Retrieves the book information through the URL and delete the book from the database using the bookModel.
         * Redirects to index with success message
         */
    }
}
