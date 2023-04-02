@extends('admin.main')

@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
    <form action="" method="post">
        <div class="card-body">
            <div class="form-group">
                <label>Tên truyện</label>
                <select name="truyen_id" class="form-control">
                    <option value="0" {{ $value->truyen_id == 0 ? 'selected' : '' }}>Tên truyện</option>
                    @foreach($truyens as $key => $truyen)
                        <option value="{{ $truyen->id }}" {{ $value->truyen_id == $truyen->id ? 'selected' : '' }}>
                            {{ $truyen->ten_truyen }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Người dùng</label>
                <select name="user_id" class="form-control">
                    <option value="0" {{ $value->user_id == 0 ? 'selected' : '' }}>Chọn user</option>
                    @foreach($users as $key => $user)
                        <option value="{{ $user->id }}" {{ $value->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Nội dung</label>
                <input type="text" name="noi_dung" class="form-control" placeholder="Nội dung" value="{{ $value->noi_dung }}"/>
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