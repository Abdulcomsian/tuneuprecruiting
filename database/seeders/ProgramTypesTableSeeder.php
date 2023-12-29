<?php

namespace Database\Seeders;

use App\Models\ProgramType;
use Illuminate\Database\Seeder;

class ProgramTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProgramType::truncate();

        $types = [
            ['name' => 'Golf'],
            ['name' => 'Soccer'],
            ['name' => 'Lacrosse'],
            ['name' => 'Hockey'],
        ];

        foreach ($types as $type) {
            ProgramType::create($type);
        }
    }
}
