<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
.
     *
     * @var array
     */
    protected $middleware = [
        \App\Http\Middleware\AuthSession::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,

    ];


}
