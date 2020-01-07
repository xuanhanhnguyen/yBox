<?php

namespace App\Http\Controllers\Page;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = DB::select('SELECT p.id,p.title,p.content,p.image,p.total_coment,p.total_like,p.total_share,
        p.total_view,p.description,s.content as \'content_share\',u.full_name,u.avatar,p.created_at,s.created_at as \'time\' 
		FROM share_post s 
        JOIN post p ON p.id = s.post_id 
        JOIN users u ON u.id = p.create_by 
        WHERE s.user_id = ?', [Auth::user()->id]);
        
        $postRecruiment = Post::whereCreate_by(Auth::user()->id)->whereType_id(1)->get();

        return view('page.profile', ['data' => $data, 'postRecruiment' => $postRecruiment]);
    }

    public function avatar(Request $request)
    {
        $user = User::find(Auth::user()->id);
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $name = $file->getClientOriginalName();
            $Hinh = Str::random(4) . '--' . $name;
            $file->move('upload/avatar', $Hinh);

            $user->avatar = $Hinh;
            $user->save();
        } else if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $Hinh = Str::random(4) . '--' . $name;
            $file->move('upload/image', $Hinh);

            $user->image = $Hinh;
            $user->save();
        }
        return redirect('page/profile');
    }

    public function edit(Request $request)
    {
        $user = User::find(Auth::user()->id);

        $user->full_name = $request->fullname;
        $user->email = $request->email;
        $user->gender = $request->gender;

        $user->save();
        return redirect('page/profile');
    }

}
