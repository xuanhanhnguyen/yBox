<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use App\User;

class RecruimentController extends Controller
{
    public function index()
    {
        $user = User::whereRole_id(2)->first();
        return view('page.recruiment.index', [
            'user' => $user
        ]);
    }
    public function createPost(Request $request)
    {
        $post          = new Post();
        $post->title   = $request->title;
        $post->content = $request->content;
    }
}
