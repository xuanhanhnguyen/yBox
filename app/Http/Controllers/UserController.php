<?php

namespace App\Http\Controllers;

use App\ComentPost;
use App\FollowHr;
use App\LikePost;
use App\Post;
use App\Reply;
use App\SharePost;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function likePost($postId)
    {
        $post = Post::findOrfail($postId);
        if (!Auth::user()) {
            return view('vui_long_dang_nhap');
        }
        $user = Auth::user();
        $liked = LikePost::whereUser_id($user->id)->wherePost_id($postId)->first();
        if ($liked) {
            $liked->delete();
            $post->total_like -= 1;
            $post->save();
            return redirect()->back();
        } else {

            LikePost::create([
                'user_id' => $user->id,
                'post_id' => $postId
            ]);
        }
        $post->total_like += 1;

        $post->save();

        return redirect()->back();
    }

    public function commentPost(Request $request, $postId)
    {
        $post = Post::findOrfail($postId);

        ComentPost::create([
            'user_id' => Auth::user()->id,
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
            'user_id' => $user->id,
            'comment_id' => $commentId,
            'content' => $request->content
        ]);

        $post->total_coment += 1;

        $post->save();
        return redirect()->back();
    }

    public function followUser($hrId)
    {
        $hr = User::find($hrId);
        if (!Auth::user()) {
            return view('vui_long_dang_nhap');
        }
        $user = Auth::user();
        $followed = FollowHr::whereUser_id($user->id)->whereHr_id($hrId)->first();
        if ($followed) {
            $followed->delete();
            $hr->total_follow -= 1;
            $hr->save();
            return redirect()->back();
        } else {
            FollowHr::create([
                'hr_id' => $hrId,
                'user_id' => $user->id
            ]);
            $hr->total_follow += 1;
            $hr->save();
            return redirect()->back();
        }
    }

    public function deletePost($id)
    {
        $post = Post::find($id);
        if (Auth::user()) {
            if (Auth::user()->id == $post->user->id) {
                $post->delete();
                return redirect()->back();
            }
            echo ('Bạn không có quyên thực hiện chức năng này !');
        } else {
            echo ('Bạn không có quyên thực hiện chức năng này !');
        }
    }

    public function share(Request $request, $postId)
    {

        $post = Post::find($postId);
        if (!Auth::user()) {
            return view('vui_long_dang_nhap');
        }
        //        return $postId;
        $user = Auth::user();
        $share = SharePost::where('user_id', $user->id)
            ->where('post_id', $postId)
            ->first();
        //        return $share;
        if ($share) {
            $share->delete();
            $post->total_share -= 1;
            $post->save();
            return redirect()->back();
        } else {
            SharePost::create([
                'post_id' => $postId,
                'user_id' => $user->id,
                'content' => $request->content
            ]);
            $post->total_share += 1;
            $post->save();
            return redirect()->back();
        }
    }

    public function search(Request $request)
    {   
        $posts = Post::whereType_id(2)->where('title', 'like', '%'.$request->search.'%')->orderBy('id', 'desc')->paginate(6);
        $postTop = Post::where('end_date', '>', Carbon::now())->get();

        return view('page.scholarship.index', [
            'posts'   => $posts,
            'postTop' => $postTop
        ]);
    }
}
