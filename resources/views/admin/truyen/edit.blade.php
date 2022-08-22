@extends('admin.main')

@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
<form action="" method="post">
        <div class="card-body">
            <div class="form-group">
                <label>Thể loại truyện</label>
                <select name="type" class="form-control">
                <option value="0" {{ $value->the_loai_id == 0 ? 'selected' : '' }}>Thể Loại</option>
                    @foreach($types as $key => $type)
                        <option value="{{ $type->id }}" {{ $value->the_loai_id == $type->id ? 'selected' : '' }}>
                            {{ $type->ten_loai }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Tên truyện</label>
                <input type="text" name="ten_truyen" class="form-control" placeholder="Nhập vào tên của truyện" value="{{ $value->ten_truyen }}">
            </div>
            <div class="form-group">
                <label>Hình đại diện</label>
                <input type="file" name="file" class="form-control" id="upload">
                <div id="image_show">
                    <a href="{{ $value->thumb }}" target="_blank">
                        <img src="{{ $value->thumb }}" width="100px">
                    </a>
                </div>
                <input type="hidden" name="thumb" id="thumb" value="{{ $value->thumb }}">
            </div>
            <div class="form-group">
                <label>Tác giả</label>
                <input type="text" name="tac_gia" class="form-control" placeholder="Nhập Tác giả của truyện" value="{{ $value->tac_gia }}">
            </div>
            <div class="form-group">
                <label>Mô tả ngắn về truyện</label>
                <textarea name="mota_ngan" id="mota_ngan" class="form-control">{{ $value->mota_ngan }}</textarea>
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