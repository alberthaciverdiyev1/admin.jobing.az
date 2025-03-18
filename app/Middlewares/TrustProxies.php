<?php

namespace App\Middlewares;

use Illuminate\Http\Request;
use Illuminate\Http\Middleware\TrustProxies as Middleware;

class TrustProxies extends Middleware
{
    protected $proxies = '*';
//    protected $headers = Request::HEADER_X_FORWARDED;
}

