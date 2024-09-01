<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // ログインが必要な画面にアクセスした際に、非ログイン状態の場合はログイン画面にリダイレクトする
        $middleware->redirectGuestsTo(function (Request $request) {
            if (request()->routeIs('admin.*')) {
                return $request->expectsJson() ? null : route('admin.login');
            }
        });

        // 非ログイン時のみアクセスできる画面に、ログイン状態でアクセスするとトップ画面にリダイレクトする
        $middleware->redirectUsersTo(function () {
            if(Auth::guard('admin')) {
                return route('admin.top');
            }
        });
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();