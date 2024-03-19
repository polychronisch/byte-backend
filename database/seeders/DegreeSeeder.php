<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DegreeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('degrees')->insert([
            'degreeTitle' => 'High School'
        ]);
        DB::table('degrees')->insert([
            'degreeTitle' => 'BSc'
        ]);
        DB::table('degrees')->insert([
            'degreeTitle' => 'MSc'
        ]);
    }
}
