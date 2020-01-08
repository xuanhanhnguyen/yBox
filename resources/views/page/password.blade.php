@extends('page.layout.content')
@section('title','Đổi mật khẩu')
@section('content')
    <main class="p-0">
        <div class="main-section">
            <div class="post-bar p-4 mr-auto ml-auto mt-5" style="float: none; width: 400px;">
                <div class="text-center">
                    <h3>Đổi mật khẩu: <span class="text-danger">(*)</span></h3>
                </div>
                <hr width="100%">
                <form id="password" method="POST" action="{{route('edit_password')}}">
                    @csrf
                    <div class="form-group">
                        <label class="mb-2">Mật khẩu mới: <span class="text-danger">(*)</span></label>
                        <input id="p1" minlength="6" type="password" name="password" class="form-control"
                               value="" placeholder="********">
                    </div>
                    <div class="form-group">
                        <label class="mb-2">Nhập lại mật khẩu: <span class="text-danger">(*)</span></label>
                        <input id="p2" minlength="6" type="password" class="form-control"
                               value="" placeholder="********">
                    </div>
                </form>
                <div class="text-center">
                    <button onclick="a()" class="btn btn-primary">Lưu thay đổi</button>
                    <p class="text-danger" id="error"></p>
                    @if (session('ok'))
                        <p class="text-success">{{session('ok')}}</p>
                    @endif
                </div>
                <script>
                    function a() {
                        var p1 = document.getElementById('p1').value;
                        var p2 = document.getElementById('p2').value;
                        if (p1 !== p2)
                            document.getElementById("error").innerHTML = "Mật khẩu không khớp nhau?";
                        else if (p1.trim() === '' || p2.trim() === '')
                            document.getElementById("error").innerHTML = "Mật khẩu không được để trống?";
                        else if (p1.length < 6 || p2.length < 6)
                            document.getElementById("error").innerHTML = "Mật khẩu phải từ 6 ký tự?";
                        else if (p1 === p2)
                            document.getElementById('password').submit();
                    }
                </script>
            </div>
        </div>
    </main>
@endsection