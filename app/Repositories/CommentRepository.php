<?php

namespace App\Repositories;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CommentRepository
{
    public function store($request)
    {
        $current_timestamp = Carbon::now()->toDateTimeString();

        $commentSaved = DB::table('comments')->insert([
            'body' => $request->body,
            'user_id' => auth()->id,
            'created_at' => $current_timestamp,
            'updated_at' => $current_timestamp
            ]
        );

        return $commentSaved;
    }

    public function storeAchievement($request)
    {
        $current_timestamp = Carbon::now()->toDateTimeString();

        $commentSaved = DB::table('comments')->insert([
            'body' => $request->body,
            'user_id' => auth()->id,
            'created_at' => $current_timestamp,
            'updated_at' => $current_timestamp
            ]
        );

        return $commentSaved;
    }

    public function storeBadge($request)
    {
        $current_timestamp = Carbon::now()->toDateTimeString();

        $commentSaved = DB::table('comments')->insert([
            'body' => $request->body,
            'user_id' => auth()->id,
            'created_at' => $current_timestamp,
            'updated_at' => $current_timestamp
            ]
        );

        return $commentSaved;
    }
}