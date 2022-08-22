@extends('admin.main')

@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
    <form action="{{ url('admin/type/add') }}" method="post">
        <div class="card-body">
            <div class="form-group">
                <label>Thể loại truyện</label>
                <input type="text" name="type" class="form-control" placeholder="Nhập thể loại truyện">
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