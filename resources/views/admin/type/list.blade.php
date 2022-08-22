@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th style="width: 50px">ID</th>
                <th>Thể Loại</th>
                <th style="width: 100px">&nbsp</th>
            </tr>
        </thead>
        <tbody>
            @foreach($values as $key => $value)
                <tr>
                    <td>{{ $value->id }}</td>
                    <td>{{ $value->ten_loai }}</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="/admin/type/edit/{{ $value->id }}">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a class="btn btn-danger btn-sm" href="" onclick="removeRow('{{ $value->id }}', '/admin/type/destroy')">
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