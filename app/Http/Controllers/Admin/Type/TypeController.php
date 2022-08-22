<?php

namespace App\Http\Controllers\Admin\Type;

use App\Http\Controllers\Controller;
use App\Models\the_loai;
use App\Services\type\TypeService;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    protected $type;

    public function __construct(TypeService $type) {
        $this->type = $type;
    }

    public function create() {
        return view('admin.type.add', [
            'title' => 'Thêm thể loại'
        ]);
    }

    public function store(Request $request) {
        $this->type->insert($request);
        return redirect()->back();
    }

    public function index() {
        return view('admin.type.list', [
            'title' => 'Danh sách thể loại',
            'values' => $this->type->getAll()
        ]);
    }

    public function show(the_loai $id) {
        return view('admin.type.edit', [
            'title' => 'Chỉnh sửa thể loại: '.$id->id,
            'value' => $id
        ]);
    }

    public function update(Request $request, the_loai $id) {
        $result = $this->type->update($request, $id);
        if ($result) {
            return redirect('/admin/type/list');
        }
        return redirect()->back();
    }

    public function destroy(Request $request) {
        $result = $this->type->destroy($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công Thể Loại'
            ]);
        }
        return response()->json([
            'error' => true,
            'message' => 'Xóa Thể Loại thất bại'
        ]);
    }
}