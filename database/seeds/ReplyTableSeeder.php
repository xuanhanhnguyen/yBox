<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ReplyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comments = [
            [
                'user_id'    => 3,
                'comment_id' => 1,
                'content'    => 'Không cho đấy thì sao ? làm sao ? ',
                'created_at' => Carbon::now()
            ],

        ];

        foreach ($comments as $comment) {
            DB::table('comment_reply')->insert($comment);
        }
    }
}
