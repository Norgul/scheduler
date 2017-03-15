<?php

use Illuminate\Database\Seeder;

class EquipmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('equipment')->insert([
            ['name' => 'Instrument 1'],
            ['name' => 'Instrument 2'],
            ['name' => 'Instrument 3'],
            ['name' => 'Instrument 4'],
            ['name' => 'Instrument 5'],
        ]);
    }
}
