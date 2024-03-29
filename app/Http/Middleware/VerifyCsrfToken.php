<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */

    protected $addHttpCookie = true;

    protected $except = [
        //
        'http://localhost:8000/api/*',
        'http://localhost:3000/*',
        'http://192.168.0.103:3000/*'
        // 'http://localhost:8000/api/service',
        // 'http://localhost:8000/api/service/*',
        // 'http://localhost:8000/api/institution',
        // 'http://localhost:8000/api/institution/*'
    ];
}
