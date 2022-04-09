<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // use ValidationService;

    /**
     * Send Successful Response - Helper function
     * @param mixed $data
     * @param string $message
     * @param integer $code - HttpStatusCode
     */
    static function returnSuccess($data, $message = "successful", $code = 200)
    {
        return response()->json([
            "code"      => "00",
            "message"   => $message,
            "data"      => $data
        ], $code);
    }

    /**
     * Created Successful Response - Helper function
     * @param mixed $data
     * @param string $message
     * @param integer $code - HttpStatusCode
     */
    static function returnCreated($data, $message = "successful", $code = 201)
    {
        return response()->json([
            "code"      => "01",
            "message"   => $message,
            "data"      => $data
        ], $code);
    }

    /**
     * Send Failed Response - Helper function
     * @param string $message
     * @param integer $code - HttpStatusCode
     * return Array
     */
    static function returnFailed($message = "failed", $code = 400)
    {
        return response()->json([
            "code"      => "03",
            "message"   => $message,
        ], $code);
    }
}
