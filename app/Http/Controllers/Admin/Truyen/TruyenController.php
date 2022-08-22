<?php

namespace App\Http\Controllers\Admin\Truyen;

use App\Http\Controllers\Controller;
use App\Models\truyen;
use App\Services\truyen\TruyenService;
use App\Services\type\TypeService;
use Illuminate\Http\Request;

class TruyenController extends Controller
{
    protected $truyen, $type;

    public function __construct(TruyenService $truyen, TypeService $type) {
        $this->truyen = $truyen;
        $this->type = $type;
    }

    public function create() {
        return view('admin.truyen.add', [
            'title' => 'Thêm truyện',
            'types' => $this->type->getAll()
        ]);
    }

    public function store(Request $request) {
        $this->truyen->insert($request);
        return redirect()->back(); 
    }

    public function index() {
        return view('admin.truyen.list', [
            'title' => 'Danh sách truyện',
            'values' => $this->truyen->getAll()
        ]);
    }

    public function show(truyen $id) {
        return view('admin.truyen.edit', [
            'title' => 'Chỉnh sửa truyện: '.$id->id,
            'value' => $id,
            'types' => $this->type->getAll()
        ]);
    }

    public function update(Request $request, truyen $id) {
        $result = $this->truyen->update($request, $id);
        if ($result) {
            return redirect('/admin/truyen/list');
        }
        return redirect()->back();
    }

    public function destroy(Request $request) {
        $result = $this->truyen->destroy($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công truyện'
            ]);
        }
        return response()->json([
            'error' => true,
            'message' => 'Xóa truyện thất bại'
        ]);
    }
}