<?php

declare(strict_types=1);

namespace app\Controller;

use app\View\View;

class MainController extends Controller
{
    public function index(): View
    {
        return View::make('user.index')->addProperty('Welcome', 'Welcome');
    }
}
