<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function apiResponse($resultType, $data, $message = null, $code = 200)
    {
        $resp = [];
        $resp['success'] = $resultType == ResultType::Success ? true : false;

        if ($resultType != ResultType::Error)
            $resp["data"] = $data;
        if ($resultType == ResultType::Error)
            $resp["errors"] = $data;
        if (isset($message))
            $resp["message"] = $message;

        return response($resp,$code);
    }
}

class ResultType
{
    const Success = 1;
    const Information = 2;
    const Warning = 3;
    const Error = 4;
}
