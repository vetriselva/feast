<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('day_activities')->insert( [
            'name' => "party",
        ]);
        DB::table('day_activities')->insert( [
            'name' => "park",
        ]);
        
    }
}
