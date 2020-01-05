<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class CommentSeederTable extends Seeder
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
                'user_id'    => 2,
                'post_id'    => 1,
                'content'    => 'Cho em mot slot nhe a !',
                'created_at' => Carbon::now()
            ],
            [
                'user_id'    => 2,
                'post_id'    => 1,
                'content'    => 'Cho khong anh ?',
                'created_at' => Carbon::now()
            ],
     

        ];

        foreach ($comments as $comment) {
            DB::table('coment_post')->insert($comment);
        }
    }
}
