<?php

/**
 * Main Application functionality.
 */
class Application
{
    public Router $router;

    public function __construct() {
        $this->router = new Router();
    }

}