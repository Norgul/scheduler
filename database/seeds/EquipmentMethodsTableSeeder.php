<?php

use Illuminate\Database\Seeder;

class EquipmentMethodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('equipment_methods')->insert([
            ['name' => 'Method 1', 'cost' => 10],
            ['name' => 'Method 2', 'cost' => 10],
            ['name' => 'Method 3', 'cost' => 10],
            ['name' => 'Method 4', 'cost' => 10],
            ['name' => 'Method 5', 'cost' => 10],
        ]);
    }
}
