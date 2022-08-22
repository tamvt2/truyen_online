@extends('admin.main')

@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
    <form action="" method="POST">
        <div class="card-body">
            <div class="form-group">
                <label>Tên truyện</label>
                <select name="truyen_id" class="form-control">
                <option value="0" {{ $value->truyen_id == 0 ? 'selected' : '' }}>Thể Loại</option>
                    @foreach($truyens as $key => $truyen)
                        <option value="{{ $truyen->id }}" {{ $value->truyen_id == $truyen->id ? 'selected' : '' }}>
                            {{ $truyen->ten_truyen }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Chương số</label>
                <input type="text" name="chuong_so" class="form-control" placeholder="Nhập vào chương" value="{{ $value->chuong_so }}">
            </div>
            <div class="form-group">
                <label>Tên chương</label>
                <input type="text" name="ten_chuong" class="form-control" placeholder="Nhập vào tên chương của truyện" value="{{ $value->ten_chuong }}">
            </div>
            <div class="form-group">
                <label>Nội dung</label>
                <textarea name="noi_dung" id="noi_dung" class="form-control">{{ $value->noi_dung }}</textarea>
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Chỉnh Sửa Thể Loại</button>
        </div>
        @csrf
    </form>
@endsection

@section('footer')
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection