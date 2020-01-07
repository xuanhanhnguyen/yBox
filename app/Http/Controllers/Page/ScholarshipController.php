<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\LikePost;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class ScholarshipController extends Controller
{
    public function index()
    {
        $posts = Post::whereType_id(2)->orderBy('id', 'desc')->paginate(6);
        $postTop = Post::where('end_date', '>', Carbon::now())->get();

        return view('page.scholarship.index', [
            'posts'   => $posts,
            'postTop' => $postTop
        ]);
    }

    public function detail($id)
    {
        $post = Post::findOrFail($id);
        $user = Auth::user();
        if ($user) {
            $liked = LikePost::whereUser_id($user->id)->wherePost_id($id)->count();
        } else {
            $liked = 0;
        }
        $post->total_view += 1;
        $post->save();
        return view('page.scholarship.detail', ['post' => $post, 'liked' => $liked]);
    }
}
