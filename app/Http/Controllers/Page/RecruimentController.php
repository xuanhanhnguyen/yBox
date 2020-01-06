<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class RecruimentController extends Controller

{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        /**
         * Get user login
         */
        
        $user = Auth::user();

        /**
         * Get post recruiment new 
         */

        $postNew = Post::whereType_id(1)
        ->orderBy('id','desc')
        ->take(1)
        ->first();

        /**
         * Get all post recruiment 
         */

        $posts = Post::whereType_id(1)
                ->orderBy('id','desc')
                ->paginate(4);
        return view('page.recruiment.index', [
            'user'    => $user,
            'postNew' => $postNew,
            'posts'   => $posts
        ]);
    }
    public function createPost(Request $request)
    {
        $post            = new Post();
        $post->title     = $request->title;
        $post->content   = $request->content;
        $post->type_id   = 1;                  // id type_post tuyển dụng = 1;
        $post->create_by = 2;                  // update .... 
        $post->save();
        
        return redirect()->back();
    }
}
