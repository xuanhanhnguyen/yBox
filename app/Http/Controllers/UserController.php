<?php

namespace App\Http\Controllers;

use App\ComentPost;
use App\FollowHr;
use App\LikePost;
use App\Post;
use App\Reply;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function likePost($postId)
    {
        $post = Post::findOrfail($postId);
        $user = User::find(3);

        LikePost::create([
            'user_id' => $user->id,
            'post_id' => $postId
        ]);

        $post->total_like += 1;

        $post->save();

        return redirect()->back();
    }
    public function commentPost(Request $request, $postId)
    {
        $post = Post::findOrfail($postId);
        $user = User::find(3);

        ComentPost::create([
            'user_id' => $user->id,
            'post_id' => $postId,
            'content' => $request->content
        ]);

        $post->total_coment += 1;

        $post->save();
        return redirect()->back();
    }

    public function replyPost(Request $request, $postId, $commentId)
    {
        $post = Post::findOrfail($postId);
        $user = User::find(2);

        Reply::create([
            'user_id'    => $user->id,
            'comment_id' => $commentId,
            'content'    => $request->content
        ]);

        $post->total_coment += 1;

        $post->save();
        return redirect()->back();
    }

    public function followUser($hrId){
        $user = User::find(3);
        FollowHr::create([
            'hr_id'   => $hrId,
            'user_id' => $user->id
        ]);
        $hr = User::find($hrId); 
        $hr->total_follow += 1;
        $hr->save();
        return redirect()->back();
    }
}
