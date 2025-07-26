<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * Global HTTP middleware stack.
     *
     * These middleware run during every request to your application.
     *
     * @var array<int, class-string|string>
     */
    protected $middleware = [
        // Confiança em proxies (Cloudflare, etc)
        \App\Http\Middleware\TrustProxies::class,
        // CORS
        \Fruitcake\Cors\HandleCors::class,
        // Manutenção e modo offline
        \App\Http\Middleware\PreventRequestsDuringMaintenance::class,
        // Valida o tamanho dos POSTs
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        // Trim dos inputs
        \App\Http\Middleware\TrimStrings::class,
        // Converte strings vazias para null
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
    ];

    /**
     * Middleware groups.
     *
     * @var array<string, array<int, class-string|string>>
     */
    protected $middlewareGroups = [
        'web' => [
            // Encripta cookies
            \App\Http\Middleware\EncryptCookies::class,
            // Adiciona cookies na response
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            // Inicia sessão (ESSENCIAL para auth e botões aparecerem)
            \Illuminate\Session\Middleware\StartSession::class,
            // Middleware opcional para autenticação da sessão
            // \Illuminate\Session\Middleware\AuthenticateSession::class,
            // Compartilha erros da sessão com as views
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            // Verificação CSRF (segurança)
            \App\Http\Middleware\VerifyCsrfToken::class,
            // Bindings de rota
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
            // Throttle API
            'throttle:api',
            // Bindings de rota
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];

    /**
     * Middleware para rotas individuais.
     *
     * @var array<string, class-string|string>
     */
    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
        'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
    ];
}