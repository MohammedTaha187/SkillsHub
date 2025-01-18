<?php

namespace Database\Seeders;

use App\Models\Cat;
use App\Models\Exam;
use App\Models\Skill;
use App\Models\Question;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       Cat::factory()->has(
        Skill::factory()->has(
            Exam::factory()->has(
                Question::factory()->count(15),
            )->count(2)
        )->count(8)
       )->count(5)->create();
    }
}
