<?php

declare(strict_types=1);

namespace app\Controller;

use app\View\View;

class MainController extends AbsController
{
    public function index(): View
    {
        return View::make('user.index')->addProperty('Welcome', 'Welcome');
    }
}
