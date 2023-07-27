@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th style="width: 50px">ID</th>
                <th>Thể loại</th>
                <th>Tên truyện</th>
                <th>Hình đại diện</th>
                <th>Tác giả</th>
                <th width="400px">Mô tả truyện</th>
                <th>Ngày đăng</th>
                <th style="width: 100px">&nbsp</th>
            </tr>
        </thead>
        <tbody>
            @foreach($values as $key => $value)
                <tr>
                    <td>{{ $value->id }}</td>
                    <td>{{ $value->ten_loai }}</td>
                    <td>{{ $value->ten_truyen }}</td>
                    <td>
                        <a href="{{ $value->thumb }}" target="_blank">
                            <img src="{{ $value->thumb }}" height="40px" width="50px">
                        </a>
                    </td>
                    <td>{{ $value->tac_gia }}</td>
                    <td class="mo_ta">{{ $value->mota_ngan }}</td>
                    <td>{{ $value->ngay_dang }}</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="/admin/truyen/edit/{{ $value->id }}">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a class="btn btn-danger btn-sm" href="" onclick="removeRow('{{ $value->id }}', '/admin/truyen/destroy')">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="card-footer clearfix">
        {!! $values->links() !!}
    </div>
@endsection