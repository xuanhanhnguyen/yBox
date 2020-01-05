<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class TypePostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            [
                'id'         => 1,
                'name'       => 'Tuyển dụng',
                'created_at' => Carbon::now()
            ],
            [
                'id'         => 2,
                'name'       => 'Học bổng',
                'created_at' => Carbon::now()

            ]

        ];

        foreach ($types as $type) {
            DB::table('type_post')->insert($type);
        }
    }
}
