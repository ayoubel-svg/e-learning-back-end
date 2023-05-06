<?php

namespace App\Traits;

trait HttpResponses
{
    public function success($data, $message = null, $code = 200)
    {
        return response()->json([
            "status" => "Request Was Succeful",
            "message" => $message,
            "data" => $data
        ], $code);
    }
    public function error($data, $message = null, $code)
    {
        return response()->json([
            "status" => "Error has occurd",
            "message" => $message,
            "data", $data
        ], $code);
    }
}
