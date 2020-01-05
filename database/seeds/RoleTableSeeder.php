<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles  = [
            [
                'id' => 1,
                'name' => 'admin', 
                'created_at' => Carbon::now()
            ],
            [
                'id' => 2,
                'name' => 'hr',
                'created_at' => Carbon::now()

            ],
            [
                'id' => 3,
                'name' => 'student',
                'created_at' => Carbon::now()
            ],
        ];

        foreach ($roles as $role) {
            DB::table('role')->insert($role);
        }
    }
}
