<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use App\Models\Category;
use App\Models\Task;
use App\Models\User;
use Database\Seeders\TaskSeeder;

class DatabaseSeeder extends Seeder
{
   
    public function run(): void
    {
       
        User::factory(10)->create();
        Category::factory(30)->create();
        Task::factory(50)->create();
       
    }
}
