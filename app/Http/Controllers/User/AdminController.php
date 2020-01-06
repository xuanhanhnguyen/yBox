<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class AdminController extends Controller
{
    public function update(Request $request,$id)
    {
        return view(
            'admin.User.updateuser',
            [
                'roles' => Role::all(),
                'user' => User::findOrFail($id)
            ]
        );
    }
    
    public function saveUpdate(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'r_password' => 'required|same:password',
               

            ],
            [
                'r_password.required' => 'Bạn chưa nhập lại mật khẩu',
                'r_password.same' => 'Mật khẩu nhập lại chưa đúng',
            ]
        );
        $user = User::findOrFail($id);
        $user->full_name =  $request->full_name;
        $user->role_id =  $request->role_id;
        $user->email =  $request->email;
        $user->gender =  $request->gender;
        $user->password = Hash::make($request->password);
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $name = $file->getClientOriginalName();
            $Hinh = Str::random(4) . '--' . $name;
            $file->move('images/', $Hinh);
            $user->avatar = $Hinh;
        }
        $user->save();

        return redirect('admin/user/show')->with('thongbao', 'Sửa thành công');
    }

    public function showAdmin(Request $request)
    {
        $user = User::paginate(5);
        return view(

            'admin.User.showuser',
            [

                'users' =>  $user

            ]
        );
    }
    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('admin/user/show')->with('thongbao', 'Xóa thành công');
    }
}
