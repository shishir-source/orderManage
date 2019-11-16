<?php

namespace Modules\User\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;
use Modules\Core\Http\Middleware\AdminMiddleware;

class Kernel extends HttpKernel
{

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
        ]
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class,
    ];
}
