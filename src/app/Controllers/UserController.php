<?php

declare(strict_types=1);

namespace app\Controller;

use app\Model\LibraryTableOpModel;
use app\Controller\Controller;

class UserController extends Controller
{
    public function index()
    {
        /**
         * Logic to retrieve users and pass them to the view
         * Renders the view for listing users
         */
        $userModel = new LibraryTableOpModel("users");
        // $users = $userModel->retrieveAllRecords("users");

        // Render the view for displaying users
        require __DIR__ . '/../Views/user/index.php';
    }

    public function create()
    {
        /**
         * Logic for creating a new user.
         * Shows a form to create a new user.
         * Renders the view (views/user/create.php) that contains the HTML form to collect user information
         */

        $basePath = str_replace($_SERVER['DOCUMENT_ROOT'], '', realpath(__DIR__ . '/../'));
        $formAction = $basePath . '/Controller/UserController.php?action=store';
        require __DIR__ . '/../Views/user/create.php';
    }

    public function store()
    {
        /**
         * Logic to store the newly created user in the database.
         * Processing the data submitted through the create form.
         * Handles data validation, and stores the new user in the database using the UserModel.
         * Redirect back to the index page with success or error message
         */
        if ($_SERVER['REQUES_METHOD'] === "POST") {
            if (isset($_POST['submitcreateUser'])) {
                $errors = []; // Declare empty array variable to store errors
                $validInputs = []; // Declare empty array variable to store valid userinputs

                // Sanitize Userinputs
                $sanitizedInput = [];
                foreach ($_POST as $fieldName => $userInput) {
                    $sanitizedInput[$fieldName] = filter_var($userInput, FILTER_SANITIZE_SPECIAL_CHARS);
                }

                // Validate Userinputs
                /** Name Field */

                /** Email Field */

                /** Course Field */

                /** Image Field */
            }
        }
        header('Location: ./../Views/user/index.php');
    }

    public function edit()
    {
        /** 
         * Shows a form to edit an existing user's information.
         * Retrieves the user information from the UserModel based on the user details provided in the URL.
         * Renders the view (views/user/edit.php) containing the edit form, and pre-fills the form fields with the user's current information
         * Redirect back to the index page with success or error message
         */
        $basePath = str_replace($_SERVER['DOCUMENT_ROOT'], '', realpath(__DIR__ . '/../'));
        $formAction = $basePath . '/Controller/UserController.php?action=update';
        require __DIR__ . '/../Views/user/edit.php';
    }

    public function update()
    {
        /**
         * Processes the data submitted through the edit form.
         * Handles data validation, and updates the user's information in the database using the UserModel
         * Redirect back to the index page with success or error message
         */
        if ($_SERVER['REQUES_METHOD'] === "POST") {
            if (isset($_POST['submiteditUser'])) {
                $errors = []; // Declare empty array variable to store errors
                $validInputs = []; // Declare empty array variable to store valid userinputs

                // Sanitize Userinputs
                $sanitizedInput = [];
                foreach ($_POST as $fieldName => $userInput) {
                    $sanitizedInput[$fieldName] = filter_var($userInput, FILTER_SANITIZE_SPECIAL_CHARS);
                }

                // Validate Userinputs
                /** Name Field */

                /** Email Field */

                /** Course Field */

                /** Image Field */
            }
        }
        // Retrieve Existing Record Data
        $userModel = new LibraryTableOpModel("users");
        // $users = $userModel->retrieveSingleRecord(tableName: "users", fieldName: $fieldName, fieldValue: $fieldValue);
        header('Location: ./../Views/user/index.php');
    }

    public function delete()

    {
        /**
         * Logic for deleting user.
         * Handles the action to delete a user from the system.
         * Retrieves the user information through the URL and delete the user from the database using the UserModel.
         * Redirects to index with success or error message
         */
        header('Location: ./../Views/user/index.php');
    }
}
