<?php

declare(strict_types=1);

namespace app\Controller;

abstract class AbsController implements IntController
{
    abstract public function index();

    protected function ensureLoggedIn(): void
    {
        if (!isset($_SESSION['user']) || empty($_SESSION['user'])) {
            header('Location: /login');
        }
    }

    protected function sanitizeuserInputs(): array
    {
        $sanitizedInputs = [];
        foreach ($_POST as $fieldName => $userInput) {
            $sanitizedInputs[$fieldName] = filter_var($userInput, FILTER_SANITIZE_SPECIAL_CHARS);
        }
        return $sanitizedInputs;
    }
}
