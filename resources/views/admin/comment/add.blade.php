@extends('admin.main')

@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
    <form action="{{ url('admin/comment/add') }}" method="post">
        <div class="card-body">
            <div class="form-group">
                <label>Tên truyện</label>
                <select name="truyen_id" class="form-control">
                    <option value="0">Chọn truyện</option>
                    @foreach($truyens as $value)
                        <option value="{{ $value->id }}">{{ $value->ten_truyen }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Người dùng</label>
                <select name="user_id" class="form-control">
                    <option value="0">Chọn user</option>
                    @foreach($users as $value)
                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Nội dung</label>
                <input type="text" name="noi_dung" class="form-control" placeholder="Nội dung">
            </div>
        </div>
        
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Lưu</button>
        </div>
        @csrf
    </form>
@endsection

@section('footer')
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection