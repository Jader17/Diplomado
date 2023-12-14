<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Cohort;
use App\Models\Program;
use App\Models\ProgramTeacher;
use App\Models\Student;
use App\Models\Teacher;
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
        Teacher::factory(20)->create();
        User::factory(5)->create();
        Program::factory(5)->create();
        ProgramTeacher::factory(50)->create();
        Cohort::factory(15)->create();
        Student::factory(100)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
