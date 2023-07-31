<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Module;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
//
        Task::factory()->create([
            'task'=>'week - 1 Test',
            'module_id' => 3,
            'time' =>date('Y-m-d'),
        ]);

//        Module::factory(1)->create([
//            'module_name' => '14th Nov Ruby',
//            'project_id' => 3,
//        ]);

//        Module::factory(2)->create();


    }
}
