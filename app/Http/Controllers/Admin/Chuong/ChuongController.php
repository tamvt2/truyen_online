<?php

namespace App\Http\Controllers\Admin\Chuong;

use App\Http\Controllers\Controller;
use App\Models\chuong;
use App\Services\chuong\ChuongService;
use App\Services\truyen\TruyenService;
use Illuminate\Http\Request;

class ChuongController extends Controller
{
    protected $chuong, $truyen;

    public function __construct(ChuongService $chuong, TruyenService $truyen)
    {
        $this->chuong = $chuong;
        $this->truyen = $truyen;
    }

    public function create() {
        return view('admin.chuong.add', [
            'title' => 'Thêm chương',
            'values' => $this->truyen->getAll()
        ]);
    }

    public function store(Request $request) {
        $this->chuong->insert($request);
        return redirect()->back();
    }

    public function index() {
        return view('admin.chuong.list', [
            'title' => 'Danh sách chương',
            'values' => $this->chuong->getAll()
        ]);
    }

    public function show(chuong $id) {
        return view('admin.chuong.edit', [
            'title' => 'Chỉnh sửa chuong: '.$id->id,
            'value' => $id,
            'truyens' => $this->truyen->getAll()
        ]);
    }

    public function update(Request $request, chuong $id) {
        $result = $this->chuong->update($request, $id);
        if ($result) {
            return redirect('/admin/chuong/list');
        }
        return redirect()->back();
    }

    public function destroy(Request $request) {
        $result = $this->chuong->destroy($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công chương'
            ]);
        }
        return response()->json([
            'error' => true,
            'message' => 'Xóa chương thất bại'
        ]);
    }
}
