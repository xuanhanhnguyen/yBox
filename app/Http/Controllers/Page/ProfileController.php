<?php

namespace App\Http\Controllers\Page;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

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

    public function avatar(Request $request){
        $user = User::find(Auth::user()->id);
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $name = $file->getClientOriginalName();
            $Hinh = Str::random(4) . '--' . $name;
            $file->move('upload/avatar', $Hinh);

            $user->avatar = $Hinh;
            $user->save();
        } else if($request->hasFile('image')){
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $Hinh = Str::random(4) . '--' . $name;
            $file->move('upload/image', $Hinh);

            $user->image = $Hinh;
            $user->save();
        }
        return redirect('page/profile');
    }
    public function edit(Request $request){
        $user = User::find(Auth::user()->id);

        $user->full_name = $request->fullname;
        $user->email = $request->email;
        $user->gender = $request->gender;

        $user->save();
        return redirect('page/profile');
    }
}
