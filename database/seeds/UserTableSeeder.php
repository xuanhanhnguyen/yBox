<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'role_id'      => 1,
                'full_name'    => 'admin',
                'email'        => 'admin@gmail.com',
                'password'     => Hash::make('123456'),
                'avatar'       => 'admin-avatar.jpg',
                'gender'       => 1,
                'total_follow' => 0,
                'created_at'   => Carbon::now()
            ],
            [
                'role_id'      => 2,
                'full_name'    => 'HR',
                'avatar'       => 'hr-avatar.jpg',
                'email'        => 'company@gmail.com',
                'password'     => Hash::make('123456'),
                'gender'       => 1,
                'total_follow' => 0,
                'created_at'   => Carbon::now()
            ],
            [
                'role_id'      => 3,
                'full_name'    => 'student',
                'avatar'       => 'student-avatar.jpg',
                'email'        => 'student@gmail.com',
                'password'     => Hash::make('123456'),
                'gender'       => 1,
                'total_follow' => 0,
                'created_at'   => Carbon::now()
            ],
        ];

        foreach($users as $user){
            DB::table('users')->insert($user);
        }
    }
}
