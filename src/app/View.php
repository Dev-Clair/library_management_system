<?php

declare(strict_types=1);

namespace app;

use stdClass;
use app\Exception\ViewNotFoundException;

class View extends stdClass
{
    const VIEWS_TEMPLATES_HEAD_PHP = "./View/components/head.php";
    const VIEWS_TEMPLATES_NAVIGATION_PHP = "./View/components/nav.php";
    const VIEWS_TEMPLATES_STATUS_PHP = "./View/components/status.php";
    const VIEWS_TEMPLATES_FOOTER_PHP = "./View/components/footer.php";
    const PROPERTY_NOT_FOUND_ALERT = "{{PROPERTY NOT FOUND!!!}}";
    const CONTENT_PLACE_HOLDER = '{{PAGE_CONTENT}}';

    public function __construct(protected string $view, protected array $params = [])
    {
    }

    public function __get($name)
    {
        if (property_exists($this, $name)) {
            return $this->{$name};
        } else {
            return self::PROPERTY_NOT_FOUND_ALERT;
        }
    }

    public static function make(string $view, array $params = [])
    {
        return new static($view, $params);
    }

    public function render(): string
    {
        $viewPath = VIEW_PATH . '/' . $this->view . '.php';
        if (!file_exists($viewPath)) {
            throw new ViewNotFoundException();
        }
        ob_start();
        require_once __DIR__ . self::VIEWS_TEMPLATES_HEAD_PHP;
        require_once __DIR__ . self::VIEWS_TEMPLATES_NAVIGATION_PHP;
        require_once __DIR__ . self::VIEWS_TEMPLATES_STATUS_PHP;
        include $viewPath;
        require_once __DIR__ . self::VIEWS_TEMPLATES_FOOTER_PHP;

        return (string) ob_get_clean();
    }

    public function __toString(): string
    {
        return $this->render();
    }
}
