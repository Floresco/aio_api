<?php

namespace App\Http\Controllers\API;

use App\Traits\ResponseContent;
use F9Web\ApiResponseHelpers;

class APIController extends \App\Http\Controllers\Controller
{
    use  ResponseContent;
//    use ApiResponseHelper;

    public function __construct()
    {
//        $this->setDefaultSuccessResponse([]);
    }
}
