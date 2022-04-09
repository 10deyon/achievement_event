<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AchievementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $achievements = [
            ["name" => "beginner"],
            ["name" => "intermediate"],
            ["name" => "advanced"],
        ];

        DB::table("achievements")->truncate();

        foreach($achievements as $achievement) {
            DB::table("achievements")->insert([
                "name" => $achievement['name'],
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ]);
        }

        
    }
}
