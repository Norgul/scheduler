<?php

use Illuminate\Database\Seeder;

class MethodColumnTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('method_columns')->insert([
            ['name' => 'HKC-132'],
            ['name' => 'UZG-987'],
            ['name' => 'EAW-567']
        ]);
    }
}
