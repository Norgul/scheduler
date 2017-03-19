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
            ['name' => 'Glucose test', 'cost' => 10],
            ['name' => 'Keihose test', 'cost' => 38],
            ['name' => 'Rezpose test', 'cost' => 16],
            ['name' => 'Rrrrose test', 'cost' => 4],
            ['name' => 'Pooocose test', 'cost' => 1],
        ]);
    }
}
