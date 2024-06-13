<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run()
    {
        // 全てのユーザーを取得
        $users = User::all();

        // 各ユーザーに対してポストを作成
        foreach ($users as $user) {
            Post::factory()->count(5)->create([
                'user_id' => $user->id,
            ]);
        }
    }
}
