<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array<string, class-string|string>
     */
    protected $routeMiddleware = [
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
        'admin' => \App\Http\Middleware\AdminMiddleware::class,
    ];

    /**
     * The priority-sorted list of middleware.
     *
     * This list includes all middleware, including the
     * middleware groups defined in the "middlewareGroups" array.
     *
     * @var array<string, int|string>
     */
    protected $middlewarePriority = [
        // Add your middleware priorities here
    ];
} 