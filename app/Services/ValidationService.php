<?php

namespace App\Services;

use Illuminate\Support\Facades\Validator;

trait ValidationService
{
    private static $errorArray;

    public static $CommentValidationRule = [
        
    ];
    
    public static $LessonValidationRule = [
    ];


    /**
     * Error message method
     * @param Array $errorArray
     * @return Mixed or null
     */
    public static function formatError($errorArray)
    {
        self::$errorArray = collect($errorArray);
        return self::$errorArray->map(function ($error) {
            return $error[0];
        });
    }

    /**
     * Validation of request parameters
     *
     * @param  $request
     * @return Mixed or null
     */
    public static function validateRequestParams(array $request, array $validationRule)
    {
        $validation = Validator::make($request, $validationRule);

        if ($validation->fails()) return self::formatError($validation->errors());
        return false;
    }
}
