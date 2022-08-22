<?php

namespace App\Http\Controllers\Admin\Photo;

use App\Http\Controllers\Controller;
use App\Models\chuong;
use App\Models\chuong_hinhanh;
use App\Services\chuong\ChuongService;
use App\Services\photo\PhotoService;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    protected $photo, $chuong;

    public function __construct(PhotoService $photo, ChuongService $chuong)
    {
        $this->photo = $photo;
        $this->chuong = $chuong;
    }

    public function create() {
        return view('admin.photo.add', [
            'title' => 'Thêm photo',
            'values' => $this->chuong->getAll()
        ]);
    }

    public function store(Request $request) {
        $this->photo->insert($request);
        return redirect()->back();
    }

    public function index() {
        return view('admin.photo.list', [
            'title' => 'Danh sách photo',
            'values' => $this->photo->getAll()
        ]);
    }

    public function show(chuong_hinhanh $id) {
        return view('admin.photo.edit', [
            'title' => 'Chỉnh sửa photo: '.$id->id,
            'chuongs' => $this->chuong->getAll(),
            'value' => $id
        ]);
    }

    public function update(Request $request, chuong_hinhanh $id) {
        $result = $this->photo->update($request, $id);
        if ($result) {
            return redirect('/admin/photo/list');
        }
        return redirect()->back();
    }

    public function destroy(Request $request) {
        $result = $this->photo->destroy($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công photo'
            ]);
        }
        return response()->json([
            'error' => true,
            'message' => 'Xóa photo thất bại'
        ]);
    }
}
