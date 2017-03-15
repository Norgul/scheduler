<?php

use Illuminate\Database\Seeder;

class ReservationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reservations')->insert([
            'user_id'=>1,
            'equipment_id'=>1,
            'reserved_from' => \Carbon\Carbon::createFromTime(15,0,0),
            'reserved_to' => \Carbon\Carbon::now()->addHour(),
        ]);
    }
}
