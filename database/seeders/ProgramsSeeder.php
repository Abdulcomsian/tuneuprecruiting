<?php

namespace Database\Seeders;

use App\Models\Program;
use App\Models\ProgramType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProgramsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProgramType::truncate();
        $types = [
            ['name' => 'Baseball'],
            ['name' => 'Men’s Basketball'],
            ['name' => 'Women’s Basketball'],
            ['name' => 'Men’s Beach Volleyball'],
            ['name' => 'Women’s Beach Volleyball'],
            ['name' => 'Men’s Bowling'],
            ['name' => 'Women’s Bowling'],
            ['name' => 'Men’s Cross Country'],
            ['name' => 'Women’s Cross Country'],
            ['name' => 'Men’s Golf'],
            ['name' => 'Women’s Golf'],
            ['name' => 'Football'],
            ['name' => 'Men’s Track & Field'],
            ['name' => 'Women’s Track & Field'],
            ['name' => 'Men’s Tennis'],
            ['name' => 'Women’s Tennis'],
            ['name' => 'Men’s Swimming'],
            ['name' => 'Women’s Swimming'],
            ['name' => 'Softball'],
            ['name' => 'Fencing'],
            ['name' => 'Field Hockey'],
            ['name' => 'Men’s Gymnastics'],
            ['name' => 'Women’s Gymnastics'],
            ['name' => 'Men’s Ice Hockey'],
            ['name' => 'Women’s Ice Hockey'],
            ['name' => 'Men’s Lacrosse'],
            ['name' => 'Women’s Lacrosse'],
            ['name' => 'Rifle'],
            ['name' => 'Rowing'],
            ['name' => 'Skiing'],
            ['name' => 'Men’s Soccer'],
            ['name' => 'Women’s Soccer'],
            ['name' => 'Men’s Volleyball'],
            ['name' => 'Women’s Volleyball'],
            ['name' => 'Men’s Water Polo'],
            ['name' => 'Women’s Water Polo'],
            ['name' => 'Men’s Wrestling'],
            ['name' => 'Women’s Wrestling'],
        ];

        foreach ($types as $type) {
            ProgramType::create($type);
        }
    }
}
