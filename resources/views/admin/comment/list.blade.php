@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th style="width: 50px">ID</th>
                <th>Tên truyện</th>
                <th>Người dùng</th>
                <th>Nội dung</th>
                <th style="width: 100px">&nbsp</th>
            </tr>
        </thead>
        <tbody>
            @foreach($values as $key => $value)
                <tr>
                    <td>{{ $value->id }}</td>
                    <td>{{ App\Services\truyen\TruyenService::getTT($value->truyen_id) }}</td>
                    <td>{{ App\Services\user\UserService::getName($value->user_id) }}</td>
                    <td>{{ $value->noi_dung }}</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="/admin/comment/edit/{{ $value->id }}">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a class="btn btn-danger btn-sm" href="" onclick="removeRow('{{ $value->id }}', '/admin/comment/destroy')">
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