<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class ScholarshipController extends Controller
{
    public function index(){
        $posts = Post::orderBy('id','desc')->paginate(6);
        return view('page.scholarship.index',[
            'posts' => $posts
        ]);
    }
    
    public function detail(){
        return view('page.scholarship.detail');
    }
}
