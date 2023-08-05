<?php

declare(strict_types=1);

namespace app\Controller;

use app\View\View;
use app\Model\UserModel;

class UserController extends Controller
{
    public function index(): View
    {
        /**
         * Logic to retrieve users and pass them to the view
         * Renders the view for listing users
         */
        $databaseName = "libraryrecords";
        $userModel = new UserModel(databaseName: $databaseName);
        $tableName = "users";
        $users = $userModel->retrieveAllUsers(tableName: $tableName);

        // Render the view for displaying users
        return View::make('user.index', ["users" => $users])->addProperty('pageTitle', 'Users');
    }

    public function create(): View
    {
        /**
         * Logic for creating a new user.
         * Shows a form to create a new user.
         * Renders the view (views/user/create.php) that contains the HTML form to collect user information
         */

        // $basePath = str_replace($_SERVER['DOCUMENT_ROOT'], '', realpath(__DIR__ . '/../'));
        // $formAction = $basePath . '/Controller/UserController.php?action=store';
        // require __DIR__ . '/../View/user/create.php';
        // Render the view for creating users
        return View::make('user.create')->addProperty('pageTitle', 'Users');
    }

    public function store()
    {
        /**
         * Logic to store the newly created user in the database.
         * Processing the data submitted through the create form.
         * Handles data validation, and stores the new user in the database using the UserModel.
         * Redirect back to the index page with success or error message
         */
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            if (isset($_POST['submitcreateUser'])) {
                $errors = []; // Declare empty array variable to store errors
                $validInputs = []; // Declare empty array variable to store valid userinputs

                // Sanitize Userinputs
                $sanitizedInputs = $this->sanitizeUserInputs();

                // Validate Userinputs
                /** Name Field */

                /** Email Field */

                /** Course Field */

                /** Image Field */
            }
        }
        header('Location: ./../View/user/index.php');
    }

    public function edit()
    {
        /** 
         * Shows a form to edit an existing user's information.
         * Retrieves the user information from the UserModel based on the user details provided in the URL.
         * Renders the view (views/user/edit.php) containing the edit form, and pre-fills the form fields with the user's current information
         * Redirect back to the index page with success or error message
         */
        // Retrieve Existing Record Data
        $databaseName = "libraryRecords";
        $userModel = new UserModel(databaseName: $databaseName);
        $tableName = "users";
        $fieldName = "";
        $fieldValue = "";
        $user = $userModel->retrieveSingleUser(tableName: $tableName, fieldName: $fieldName, fieldValue: $fieldValue);

        // $basePath = str_replace($_SERVER['DOCUMENT_ROOT'], '', realpath(__DIR__ . '/../'));
        // $formAction = $basePath . '/Controller/UserController.php?action=update';

        // require __DIR__ . '/../View/user/edit.php';

        // Render the view for updating users
        return View::make('user.edit', ["user" => $user])->addProperty('pageTitle', 'Users');
    }

    public function update()
    {
        /**
         * Processes the data submitted through the edit form.
         * Handles data validation, and updates the user's information in the database using the UserModel
         * Redirect back to the index page with success or error message
         */
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            if (isset($_POST['submiteditUser'])) {
                $errors = []; // Declare empty array variable to store errors
                $validInputs = []; // Declare empty array variable to store valid userinputs

                // Sanitize Userinputs
                $sanitizedInputs = $this->sanitizeUserInputs();

                // Validate Userinputs
                /** Name Field */

                /** Email Field */

                /** Course Field */

                /** Image Field */
            }
        }
        header('Location: ./../View/user/index.php');
    }

    public function delete()

    {
        /**
         * Logic for deleting user.
         * Handles the action to delete a user from the system.
         * Retrieves the user information through the URL and delete the user from the database using the UserModel.
         * Redirects to index with success or error message
         */
        header('Location: ./../View/user/index.php');
    }
}
