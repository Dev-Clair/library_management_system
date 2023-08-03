<?php

declare(strict_types=1);

namespace app;

use app\Exception\ViewNotFoundException;

class View
{
    protected string $view;
    protected array $params = [];

    public function __construct(string $view, array $params = [])
    {
        $this->view = $view;
        $this->params = $params;
    }

    public function addProperty(string $property, mixed $value): self
    {
        $this->params[$property] = $value;
        return $this;
    }

    public static function make(string $view, array $params = []): self
    {
        return new static($view, $params);
    }

    public function render(string $layout = 'layout.php'): string
    {
        $viewPath = VIEW_PATH . '/' . $this->view . '.php';
        $layoutPath = VIEW_PATH . '/' . $layout;

        if (!file_exists($viewPath) || !file_exists($layoutPath)) {
            throw new ViewNotFoundException();
        }

        ob_start();
        require_once $layoutPath;
        return (string) ob_get_clean();
    }

    public function __toString(): string
    {
        return $this->render();
    }
}
