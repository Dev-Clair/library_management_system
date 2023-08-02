<?php

declare(strict_types=1);

namespace app\Controller;

use app\View;

class MainController extends Controller
{
    public function index(): View
    {
        return View::make('user.index')->pageTitle('Welcome');
    }

    public function create()
    {
    }

    public function store()
    {
    }

    public function edit()
    {
    }

    public function update()
    {
    }

    public function delete()
    {
    }
}
