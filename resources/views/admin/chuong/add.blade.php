@extends('admin.main')

@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
    <form action="{{ url('admin/chuong/add') }}" method="post">
        <div class="card-body">
            <div class="form-group">
                <label>Tên truyện</label>
                <select name="truyen_id" class="form-control">
                    <option value="0">Chọn truyện</option>
                    @foreach($values as $value)
                        <option value="{{ $value->id }}">{{ $value->ten_truyen }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Chương số</label>
                <input type="text" name="chuong_so" class="form-control" placeholder="Nhập vào số chương của truyện">
            </div>
            <div class="form-group">
                <label>Tên chương</label>
                <input type="text" name="ten_chuong" class="form-control" placeholder="Nhập vào tên chương của truyện">
            </div>
            <div class="form-group">
                <label>Nội dung</label>
                <textarea name="noi_dung" id="noi_dung" class="form-control">{{ old('description') }}</textarea>
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