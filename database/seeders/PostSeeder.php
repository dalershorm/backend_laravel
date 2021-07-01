<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 20; $i++) {
            \App\Models\Post::create([
                'title'=> Str::random(15),
                'desc'=> Str::random(150),
                'category_id'=> random_int(1,2),
                'user_id'=> random_int(1,10),
                'is_active'=> 1,
            ]);
        }
    }
}
