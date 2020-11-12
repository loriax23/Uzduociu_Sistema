<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'user_type' => 1,
            'password' => Hash::make('admin'),
        ]);

        DB::table('users')->insert([
            'name' => 'Jonas',
            'email' => 'jonas@gmail.com',
            'user_type' => 0,
            'password' => Hash::make('test'),
        ]);

        DB::table('users')->insert([
            'name' => 'Antanas',
            'email' => 'antanas@gmail.com',
            'user_type' => 0,
            'password' => Hash::make('test'),
        ]);

        Task::factory()
            ->times(16)
            ->create();
    }
}
