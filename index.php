<?php

use Dotenv\Dotenv;
use Mvc\Routes;

require __DIR__ . '/vendor/autoload.php';

Dotenv::createImmutable(__DIR__)->load();

Routes::init();
