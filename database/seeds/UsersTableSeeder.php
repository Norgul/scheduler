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
                'role_id' => '1',
                'highlight_color' => '#337ab7'
            ],
            [
                'name' => 'Random user',
                'email' => 'user@user.com',
                'password' => bcrypt('test'),
                'research_group' => 'some_group',
                'cell_number' => '+23424452',
                'active' => true,
                'role_id' => '2',
                'highlight_color' => '#5cb85c'
            ],
            [
                'name' => 'Random user2',
                'email' => 'user2@user.com',
                'password' => bcrypt('test'),
                'research_group' => 'some_group',
                'cell_number' => '+23424452',
                'active' => false,
                'role_id' => '3',
                'highlight_color' => '#d9534f'
            ],
            [
                'name' => 'Random user3',
                'email' => 'user3@user.com',
                'password' => bcrypt('test'),
                'research_group' => 'some_group',
                'cell_number' => '+23424452',
                'active' => true,
                'role_id' => '4',
                'highlight_color' => '#5bc0de'
            ],
        ]);
    }
}
