<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Tạo 1 tài khoản Admin
        User::factory()->admin()->create([
            'username' => 'admin',
            'password' => Hash::make('password'),
            'fullname' => 'Administrator',
            'isActived' => 1,
        ]);

        // Tạo 10 users bình thường, mỗi user có 3 bài post
        User::factory(10)->create()->each(function ($user) {
            Post::factory(3)->create([
                'user_id' => $user->id,
            ]);
        });
    }
}
