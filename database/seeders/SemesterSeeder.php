<?php

namespace Database\Seeders;

use App\Models\Semester;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SemesterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Semester::create([
            'semester_name' => '1st',
            'semester_type' => 'Fall',
        ]);
        Semester::create([
            'semester_name' => '2nd',
            'semester_type' => 'Spring',
        ]);
        Semester::create([
            'semester_name' => '3rd',
            'semester_type' => 'Fall',
        ]);
        Semester::create([
            'semester_name' => '4th',
            'semester_type' => 'Spring',
        ]);
        Semester::create([
            'semester_name' => '5th',
            'semester_type' => 'Fall',
        ]);
        Semester::create([
            'semester_name' => '6th',
            'semester_type' => 'Spring',
        ]);
        Semester::create([
            'semester_name' => '7th',
            'semester_type' => 'Fall',
        ]);
        Semester::create([
            'semester_name' => '8th',
            'semester_type' => 'Spring',
        ]);
        Semester::create([
            'semester_name' => 'Summer',
            'semester_type' => 'Summer',
        ]);
    }
}
