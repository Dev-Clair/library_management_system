<?php

declare(strict_types=1);

namespace app;

use stdClass;

class Layout extends stdClass
{
    const VIEWS_TEMPLATES_HEAD_PHP = "./Views/components/head.php";
    // const VIEWS_TEMPLATES_NAVIGATION_PHP = "./Views/components/";
    const VIEWS_TEMPLATES_STATUS_PHP = "./Views/components/status.php";
    const VIEWS_TEMPLATES_FOOTER_PHP = "./Views/components/footer.php";
    const VIEWS_TEMPLATES_PAGE_CONTENT_PHP = "./Views/components/pageContent.php";
    const PROPERTY_NOT_FOUND_ALERT = "{{PROPERTY NOT FOUND!!!}}";


    public function __construct(private string $viewAction, private string $viewClass)
    {
    }

    public function render()
    {
    }
}
