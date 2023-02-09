<?php

namespace App\Http\Controllers\API;

use F9Web\ApiResponseHelpers;

class APIController extends \App\Http\Controllers\Controller
{
    use ApiResponseHelpers;

    public function __construct()
    {
        $this->setDefaultSuccessResponse([]);
    }
}
