<?php

<<<<<<< HEAD
use Illuminate\Foundation\Application;
=======
use Illuminate\Contracts\Http\Kernel;
>>>>>>> d624a76 (Corrigindo diversos erros)
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

<<<<<<< HEAD
// Determine if the application is in maintenance mode...
=======
// Verifica se está em modo de manutenção
>>>>>>> d624a76 (Corrigindo diversos erros)
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

<<<<<<< HEAD
// Register the Composer autoloader...
require __DIR__.'/../vendor/autoload.php';

// Bootstrap Laravel and handle the request...
/** @var Application $app */
$app = require_once __DIR__.'/../bootstrap/app.php';

$app->handleRequest(Request::capture());
=======
// Autoload do Composer
require __DIR__.'/../vendor/autoload.php';

// Bootstrapping do Laravel
$app = require_once __DIR__.'/../bootstrap/app.php';

// Cria o kernel e trata a requisição
$kernel = $app->make(Kernel::class);

$response = $kernel->handle(
    $request = Request::capture()
)->send();

$kernel->terminate($request, $response);
>>>>>>> d624a76 (Corrigindo diversos erros)
