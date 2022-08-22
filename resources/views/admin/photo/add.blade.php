@extends('admin.main')

@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
    <form action="" method="post">
        <div class="card-body">
            <div class="form-group">
                <label>Chương</label>
                <select name="chuong_id" class="form-control">
                    <option value="0">Chọn chương</option>
                    @foreach($values as $value)
                        <option value="{{ $value->id }}">
                            {{ $value->chuong_so.': '.$value->ten_chuong.' - '.
                                App\Services\truyen\TruyenService::getTT($value->truyen_id) }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Ảnh</label>
                <input type="file" name="file" class="form-control" id="upload">
                <div id="image_show"></div>
                <input type="hidden" name="thumb" id="thumb">
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