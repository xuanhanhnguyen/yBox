<?php

namespace App\Http\Controllers\page;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('page.password');
    }


    public function edit(Request $request)
    {
        $user = User::find(Auth::user()->id);

        $user->password = Hash::make($request->password);

        $user->save();
        return redirect('page/password')->with('ok', 'Mật khẩu đã được thay đổi!');
    }

    public function update(Request $request)
    {
        $user = DB::table('Users')
            ->select('id')
            ->where('email','=', $request->email)
            ->first();
        if($user !== null){
            $pass = User::find($user->id);

            $pass->password = Hash::make(123456);
            $pass->save();
            return 'Thành công mật khẩu của bạn là 123456';
        }
        else
            return 'Email không chính xác vui lòng nhập lại Email?';
    }
}