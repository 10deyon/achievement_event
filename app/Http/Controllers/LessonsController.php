<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Services\ValidationService;
use Illuminate\Http\Request;

class LessonsController extends Controller
{
    use ValidationService;

    public function create(Request $request)
    {
        $isErrored =  ValidationService::validateRequestParams($request->all(), ValidationService::$CommentValidationRule);
		if ($isErrored) return $this->returnFailed($isErrored);

        try {
            $comment = Lesson::create([
                "body" => "First Comment Written",
                "user_id" => 1
            ]);
    
            if (!$comment) throw new \Exception("Error Processing Request", 1);
            
            CommentWritten::dispatch($comment);
            
            return $this->returnCreated($comment);
        } catch (\Exception $e) {
            return $this->returnFailed($e->getMessage(), 400);
        }
    }
}
