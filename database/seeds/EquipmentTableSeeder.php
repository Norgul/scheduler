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
            ['name' => 'Instrument 1', 'method_column_id' => 1],
            ['name' => 'Instrument 2', 'method_column_id' => 2],
            ['name' => 'Instrument 3', 'method_column_id' => 3],
            ['name' => 'Instrument 4', 'method_column_id' => 1],
            ['name' => 'Instrument 5', 'method_column_id' => 2],
        ]);
    }
}
