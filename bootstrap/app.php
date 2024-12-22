<?php

use App\Http\Middleware\User;
use App\Http\Middleware\Admin;
use Illuminate\Foundation\Application;
use App\Http\Middleware\EventOrganizer;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'user' => User::class,
            'admin' => Admin::class,
            'eventOrganizer' => EventOrganizer::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();