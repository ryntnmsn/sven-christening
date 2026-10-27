<?php

//require __DIR__.'/../public/index.php';

use Illuminate\Http\Request;
use Illuminate\View\ViewServiceProvider;

define('LARAVEL_START', microtime(true));

require __DIR__.'/../vendor/autoload.php';

$app = require_once __DIR__.'/../bootstrap/app.php';

$app->register(ViewServiceProvider::class);

$app->handleRequest(Request::capture());
