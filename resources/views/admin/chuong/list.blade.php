@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th style="width: 50px">ID</th>
                <th>Tên truyện</th>
                <th>Chương số</th>
                <th>Tên chương</th>
                <th>Nội dung</th>
                <th style="width: 100px">&nbsp</th>
            </tr>
        </thead>
        <tbody>
            @foreach($values as $key => $value)
                <tr>
                    <td>{{ $value->id }}</td>
                    <td>{{ $value->ten_truyen }}</td>
                    <td>{{ $value->chuong_so }}</td>
                    <td>{{ $value->ten_chuong }}</td>
                    <td class="mo_ta">{{ $value->noi_dung }}</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="/admin/chuong/edit/{{ $value->id }}">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a class="btn btn-danger btn-sm" href="" onclick="removeRow('{{ $value->id }}', '/admin/chuong/destroy')">
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