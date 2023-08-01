<?php

declare(strict_types=1);

namespace app\Controller;

abstract class Controller implements ControllerInterface
{
    abstract protected function index();
    abstract protected function create();
    abstract protected function store();
    abstract protected function edit();
    abstract protected function update();
    abstract protected function delete();

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
