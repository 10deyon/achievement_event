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
        for ($i=1; $i <= 20; $i++) {
            DB::table("commentachvment")->insert([
                "name" => $i . " Comment Written",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ]);
        }

        for ($i=1; $i <= 20; $i++) {
            DB::table("lessonachvment")->insert([
                "name" => $i . " Lessons Watched",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ]);
        }
    }
}
