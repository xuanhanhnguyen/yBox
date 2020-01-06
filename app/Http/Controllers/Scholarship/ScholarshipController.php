<?php

namespace App\Http\Controllers\Scholarship;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Str;

class ScholarshipController extends Controller
{
    public function create(Request $request)
    {
        return view('admin.Scholarship.createscholarship');
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

        $scholarship = new Post();
        $scholarship->title =  $request->title;
        $scholarship->content =  $request->content;
        $scholarship->type_id = 2;
        $scholarship->create_by = 1;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $Hinh = Str::random(4) . '--' . $name;
            $file->move('upload/scholarship', $Hinh);
            $scholarship->image = $Hinh;
        } else {
            $scholarship->image = "";
        }
        $scholarship->save();

        return redirect('admin/scholarship/show')->with('thongbao', 'Thêm thành công');
    }

    public function update(Request $request, $id)
    {
        return view(
            'admin.scholarship.updatescholarship',
            [

                'scholarship' => Post::findOrFail($id)

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
        $scholarship = Post::findOrFail($id);
        $scholarship->title =  $request->title;
        $scholarship->content =  $request->content;
        $scholarship->type_id = 2;
        $scholarship->create_by = 1;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $Hinh = Str::random(4) . '--' . $name;
            $file->move('upload/scholarship', $Hinh);
            // unlink('upload/scholarship/' . $scholarship->image);
            $scholarship->image = $Hinh;
        }
        $scholarship->save();

        return redirect('admin/scholarship/show')->with('thongbao', 'Sửa thành công');
    }
    public function delete($id)
    {
        $recruitment = Post::find($id);
        $recruitment->delete();
        return redirect('admin/scholarship/show')->with('thongbao', 'Xóa thành công');
    }

    public function showScholarship(Request $request)
    {
        $scholarship = Post::where('type_id', 2)->paginate(5);
        return view(

            'admin.Scholarship.showscholarship',
            [

                'scholarships' =>  $scholarship

            ]
        );
    }

}
