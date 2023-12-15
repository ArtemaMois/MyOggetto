<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Theme;
use App\Models\Lector;
use App\Models\Meeting;
use App\Models\Event;
use App\Models\Quiz;
use App\Models\Answer;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(2)->create();
        Theme::factory(1)->create();
        Lector::factory(2)->create();
        Meeting::factory(5)->create();
        Event::factory(5)->create();
        Quiz::factory(3)->create();
        Answer::factory(4)->create();
    }
}
