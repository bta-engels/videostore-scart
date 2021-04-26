<?php

namespace App\Http\Controllers\API;

class ApiController
{
    public function __construct()
    {
        $this->middleware('api:auth');
    }
}
