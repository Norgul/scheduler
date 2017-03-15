<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('test'),
                'research_group' => 'some_group',
                'cell_number' => '+23424452',
                'active' => true,
                'role_id' => '1'
            ],
            [
                'name' => 'Random user',
                'email' => 'user@user.com',
                'password' => bcrypt('test'),
                'research_group' => 'some_group',
                'cell_number' => '+23424452',
                'active' => true,
                'role_id' => '2'
            ],
        ]);
    }
}
