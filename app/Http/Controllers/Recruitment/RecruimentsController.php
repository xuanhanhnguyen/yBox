<?php

namespace App\Http\Controllers\Recruitment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Str;

class RecruimentsController extends Controller
{
    public function create(Request $request)
    {
        return view('admin.Recruitment.createrecruitment');
    }
    public function saveCreate(Request $request)
    {
        $request->validate(
            [
                'title' => 'required',
                'content' => 'required'
            ],
            [
                'title.required' => 'Bạn chưa nhập tiêu đề',
                'content.required' => 'Bạn chưa nhập nội dung',

            ]
        );

        $recruitment = new Post();
        $recruitment->title =  $request->title;
        $recruitment->content =  $request->content;
        $recruitment->type_id = 1;
        $recruitment->create_by = 2;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $Hinh = Str::random(4) . '--' . $name;
            $file->move('upload/recruitment', $Hinh);
            $recruitment->image = $Hinh;
        } else {
            $recruitment->image = "";
        }
        $recruitment->save();

        return redirect('admin/recruiment/show')->with('thongbao', 'Thêm thành công');
    }

    public function update(Request $request, $id)
    {
        return view(
            'admin.Recruitment.updaterecruitment',
            [

                'recruitment' => Post::findOrFail($id)

            ]
        );
    }

    public function saveUpdate(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'title' => 'required',
                'content' => 'required'

            ],
            [
                'title.required' => 'Bạn chưa nhập tiêu đề',
                'content.required' => 'Bạn chưa nhập nội dung',
            ]
        );
        $recruitment = Post::findOrFail($id);
        $recruitment->title =  $request->title;
        $recruitment->content =  $request->content;
        $recruitment->type_id = 1;
        $recruitment->create_by = 2;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $Hinh = Str::random(4) . '--' . $name;
            $file->move('upload/recruitment', $Hinh);
            // unlink('upload/recruitment/' . $recruitment->image);
            $recruitment->image = $Hinh;
        }
        $recruitment->save();

        return redirect('admin/recruiment/show')->with('thongbao', 'Sửa thành công');
    }
    public function delete($id)
    {
        $recruitment = Post::find($id);
        $recruitment->delete();
        return redirect('admin/recruiment/show')->with('thongbao', 'Xóa thành công');
    }

    public function showRecruitment(Request $request)
    {
        $recruitment = Post::where('type_id', 1)->paginate(5);
        return view(

            'admin.Recruitment.showecruitment',
            [

                'recruitments' =>  $recruitment

            ]
        );
    }
}
