<?php

namespace App\Http\Controllers\Page;

use Illuminate\Routing\Controller;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('page.profile');
    }
}
