<?php

declare(strict_types=1);

namespace app\Controller;

abstract class Controller implements ControllerInterface
{
    abstract public function index();
    abstract public function create();
    abstract public function store();
    abstract public function edit();
    abstract public function update();
    abstract public function delete();
}
