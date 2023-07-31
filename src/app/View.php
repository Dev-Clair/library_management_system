<?php

declare(strict_types=1);

namespace app;

use stdClass;

class View extends stdClass
{
    const VIEWS_TEMPLATES_HEAD_PHP = "./View/components/head.php";
    const VIEWS_TEMPLATES_NAVIGATION_PHP = "./View/components/nav.php";
    const VIEWS_TEMPLATES_STATUS_PHP = "./View/components/status.php";
    const VIEWS_TEMPLATES_PAGE_CONTENT_PHP = "./View/components/pageContent.php";
    const VIEWS_TEMPLATES_FOOTER_PHP = "./View/components/footer.php";
    const PROPERTY_NOT_FOUND_ALERT = "{{PROPERTY NOT FOUND!!!}}";
    const CONTENT_PLACE_HOLDER = '{{PAGE_CONTENT}}';

    public function __construct(private string $viewActionName, private string $viewClassName)
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
    public function render(string $pathToView, array $dataToRender): string
    {
        $this->renderData($dataToRender);
        $absoluteFilePath = __DIR__ . '/../Views/' . $this->viewClassName . '/' . $pathToView . ".php";
        if (file_exists($absoluteFilePath)) {
            $pageHeader = $this->getPageHeader();
            $pageContent = $this->getPageContent($absoluteFilePath);
            $header = $this->replaceContentPlaceHolder($pageContent, $pageHeader);
            $footer = $this->getPageFooter();
            return $header . $footer;
        }
        return '';
    }

    private function renderData(array $dataToRender): void
    {
        foreach ($dataToRender as $key => $data) {
            $this->{$key} = $data;
        }
    }

    public function getviewClassName(): string
    {
        return $this->viewClassName;
    }

    public function setViewClassName(string $viewClassName): void
    {
        $this->viewClassName = $viewClassName;
    }

    public function getViewActionName(): string
    {
        return $this->viewActionName;
    }

    public function setViewActionName(string $viewActionName): void
    {
        $this->viewActionName = $viewActionName;
    }

    private function getPageHeader(): string|false
    {
        $data = $this;
        ob_start();
        require_once __DIR__ . self::VIEWS_TEMPLATES_HEAD_PHP;
        require_once __DIR__ . self::VIEWS_TEMPLATES_NAVIGATION_PHP;
        require_once __DIR__ . self::VIEWS_TEMPLATES_PAGE_CONTENT_PHP;
        $pageHeader = ob_get_contents();
        ob_end_clean();
        return $pageHeader;
    }

    private function getPageContent(string $absoluteFilePath): string|false
    {
        $data = $this;
        ob_start();
        require_once $absoluteFilePath;
        $pageContent = ob_get_contents();
        ob_end_clean();
        return $pageContent;
    }

    private function getPageFooter(): string|false
    {
        $data = $this;
        ob_start();
        require_once __DIR__ . self::VIEWS_TEMPLATES_FOOTER_PHP;
        $pageFooter = ob_get_contents();
        ob_end_clean();
        return $pageFooter;
    }

    private function replaceContentPlaceHolder(false|string $pageContent, false|string $pageHeader): string|array|false
    {
        $header = str_replace(self::CONTENT_PLACE_HOLDER, $pageContent, $pageHeader);
        return $header;
    }
}
