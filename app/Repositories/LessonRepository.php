<?php

namespace App\Repositories;

use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CommentRepository
{
   public function store($request)
   {
      $current_timestamp = Carbon::now()->toDateTimeString();

      $commentSaved = DB::table('lesson_user')->insert([
         'lesson_id' => $request->id,
         'user_id' => auth()->id,
         'created_at' => $current_timestamp,
         'updated_at' => $current_timestamp
         ]
      );
      return $commentSaved;
   }
}
