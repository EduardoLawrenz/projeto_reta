<?php

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Verifica se está em modo de manutenção
if (file_exists($maintenance = __DIR__ . '/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Autoload do Composer
require __DIR__ . '/../vendor/autoload.php';

// Bootstrapping do Laravel
$app = require_once __DIR__ . '/../bootstrap/app.php';

// Cria o kernel e trata a requisição
$kernel = $app->make(Kernel::class);

$response = $kernel->handle(
    $request = Request::capture()
)->send();

$kernel->terminate($request, $response);