<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            ['name' => 'Administrator'],
            ['name' => 'Assistant'],
            ['name' => 'Hons'],
            ['name' => 'M.Sc'],
            ['name' => 'Ph.D'],
            ['name' => 'Post Doc'],
            ['name' => 'Lecturer'],
            ['name' => 'Student'],
        ]);
    }
}
