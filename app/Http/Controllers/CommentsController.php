<?php

namespace App\Http\Controllers;

use App\Events\CommentWritten;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function createComment(Request $request)
    {
        dd($request);
        $comment = Comment::create([
            "body" => "First Comment Written",
            "user_id" => 1
        ]);
        if (!$comment) throw new \Exception("Error Processing Request", 1);
        
        CommentWritten::dispatch($comment);
        
        return $this->returnCreated($comment);
    }
}
