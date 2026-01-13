<?php

namespace Database\Seeders;

use App\Models\CourseModel;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

CourseModel::created([
            'title' => 'Test Course',
            'description' => 'This is a test course.',
            'price' => 9.99,
            'discount' => 0,
            'start_date' => '2023-09-01',
            'video' => 'test_video.mp4',
        ]);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
