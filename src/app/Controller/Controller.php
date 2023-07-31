<?php

declare(strict_types=1);

namespace app\Controller;

use app\View;

abstract class Controller implements ControllerInterface
{
    protected ?array $dataToRender;

    public function __construct(protected View $view)
    {
        $this->dataToRender["pageTitle"] = "Library";
    }

    abstract protected function index();
    abstract protected function create();
    abstract protected function store();
    abstract protected function edit();
    abstract protected function update();
    abstract protected function delete();

    public function __call($name, $args)
    {
        if (method_exists($this, $name)) {
            $classNameSpace = get_class($this);
            $className = str_replace('app\\Controller', '', $classNameSpace);
            $this->view->setViewClassName(str_replace('Controller', '', $className));
            return call_user_func_array(array($this, $name), $args);
        }
    }

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
