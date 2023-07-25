<?php

declare(strict_types=1);

namespace app\Controller;

interface ControllerInt
{
    public function index();
    public function create();
    public function store();
    public function edit();
    public function update();
    public function delete();
}
