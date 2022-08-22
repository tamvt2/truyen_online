<?php
namespace App\Services\photo;

use App\Models\chuong_hinhanh;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class PhotoService {
    public function insert($request) {
        try {
            chuong_hinhanh::create([
                'chuong_id' => $request->input('chuong_id'),
                'thumb' => $request->input('thumb')
            ]);
            Session::flash('success', 'Thêm photo thành công');
        } catch (\Exception $e) {
            Session::flash('error', 'Thêm thất bại');
            Log::info($e->getMessage());
            return false;
        }
        return true;
    }

    public function getAll() {
        return chuong_hinhanh::orderBy('id', 'asc')->paginate(15);
    }

    public function update($request, $id) {
        try {
            $id->fill([
                'chuong_id' => $request->input('chuong_id'),
                'thumb' => $request->input('thumb')
            ]);
            $id->save();
            Session::flash('success', 'Cập nhật photo thành công');
        } catch (\Exception $e) {
            Session::flash('error', 'Cập nhật thất bại');
            Log::info($e->getMessage());
            return false;
        }
        return true;
    }

    public function destroy($request) {
        $id = $request->input('id');
        $value = chuong_hinhanh::where('id', $id)->first();
        if ($value) {
            return chuong_hinhanh::where('id', $id)->delete();
        }
        return false;
    }
}