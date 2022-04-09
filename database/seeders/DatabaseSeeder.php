<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $lessons = Lesson::factory()
        //     ->count(20)
        //     ->create();
        
        $this->call(CommentSeeder::class);
        $this->call(LessonSeeder::class);
        $this->call(UserSeeder::class);
        // $this->call(BadgeSeeder::class);
        // $this->call(AchievementSeeder::class);
    }
}
