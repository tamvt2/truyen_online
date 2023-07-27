@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th style="width: 50px">ID</th>
                <th>Chương</th>
                <th>Photo</th>
                <th style="width: 100px">&nbsp</th>
            </tr>
        </thead>
        <tbody>
            @foreach($values as $key => $value)
                <tr>
                    <td>{{ $value->id }}</td>
                    <td>{{ $value->chuong_so }}: {{ $value->ten_chuong }}</td>
                    <td>
                        <a href="{{ $value->thumb }}" target="_blank">
                            <img src="{{ $value->thumb }}" height="40px" width="50px">
                        </a>
                    </td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="/admin/photo/edit/{{ $value->id }}">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a class="btn btn-danger btn-sm" href="" onclick="removeRow('{{ $value->id }}', '/admin/photo/destroy')">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection