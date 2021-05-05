<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Reply;
use App\Models\User;
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
         User::factory(50)->create();
         Comment::factory(100)->create();
         Reply::factory(200)->create();
    }
}
