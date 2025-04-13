<?php
require_once '../env.php';
require_once '../core/Helpers.php';
require_once '../core/Loader.php';

use Core\Loader;
use Core\Route;

session_start();
Loader::register();

date_default_timezone_set(env('APP_TIMEZONE', 'UTC'));

require_once base_path('routes/web.php');

Route::dispatch();
