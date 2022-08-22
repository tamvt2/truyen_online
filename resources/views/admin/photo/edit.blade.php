@extends('admin.main')

@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
    <form action="" method="POST">
        <div class="card-body">
            <div class="form-group">
                <label>Chương</label>
                <select name="chuong_id" class="form-control">
                <option value="0" {{ $value->chuong_id == 0 ? 'selected' : '' }}>Chọn chương</option>
                    @foreach($chuongs as $key => $chuong)
                        <option value="{{ $chuong->id }}" {{ $value->chuong_id == $chuong->id ? 'selected' : '' }}>
                            {{ $chuong->chuong_so.': '.$chuong->ten_chuong.' - '.
                                App\Services\truyen\TruyenService::getTT($chuong->truyen_id) }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Ảnh</label>
                <input type="file" name="file" class="form-control" id="upload">
                <div id="image_show">
                    <a href="{{ $value->thumb }}" target="_blank">
                        <img src="{{ $value->thumb }}" width="100px">
                    </a>
                </div>
                <input type="hidden" name="thumb" id="thumb" value="{{ $value->thumb }}"/>
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