<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BadgeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $badges = [
            ["name" => "beginner", "level" => 5],
            ["name" => "intermediate", "level" => 10],
            ["name" => "professional", "level" => 15],
            ["name" => "advanced", "level" => 20],
        ];
        
        foreach($badges as $badge) {
            DB::table("badges")->insert([
                "name" => $badge['name'],
                "level" => $badge['level'],
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ]);
        }
    }
}
