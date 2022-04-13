<?php

use App\Events\CommentWritten;
use App\Events\LessonWatched;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AchievementsController;
use App\Models\Comment;
use App\Models\Lesson;
use App\Models\User;

Route::get('/', function () use ($router) {
   return "event-assessment";
});

Route::get('/users/{user}/achievements', [AchievementsController::class, 'index']);

Route::get('/users/comment', function() {
   $user = User::inRandomOrder()->first();
   $comment = Comment::create([
      "body" => "Comment body",
      "user_id" => $user->id
   ]);
   
   event( new CommentWritten($comment) );

   return response()->json('Comment written');
});

Route::get('/users/lesson/{lesson}', function(Lesson $lesson) {
   $user = User::inRandomOrder()->first();
   
   event( new LessonWatched($lesson, $user) );

   return response()->json('Lesson watched');

});
