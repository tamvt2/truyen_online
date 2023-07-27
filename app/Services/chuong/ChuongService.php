<?php
namespace App\Services\chuong;

use App\Models\chuong;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class ChuongService {
    public function insert($request) {
        try {
            chuong::create([
                'truyen_id' => $request->input('truyen_id'),
                'chuong_so' => $request->input('chuong_so'),
                'ten_chuong' => $request->input('ten_chuong'),
                'noi_dung' => $request->input('noi_dung')
            ]);
            Session::flash('success', 'Thêm chương thành công');
        } catch (\Exception $e) {
            Session::flash('error', 'Thêm thất bại');
            Log::info($e->getMessage());
            return false;
        }
        return true;
    }

    public function getAll() {
        return chuong::join('truyens', 'chuongs.truyen_id', '=', 'truyens.id')
        ->select('chuongs.*', 'truyens.ten_truyen')->orderBy('truyen_id', 'asc')
        ->paginate(15);
    }

    public function update($request, $id) {
        try {
            $id->fill([
                'truyen_id' => $request->input('truyen_id'),
                'chuong_so' => $request->input('chuong_so'),
                'ten_chuong' => $request->input('ten_chuong'),
                'noi_dung' => $request->input('noi_dung')
            ]);
            $id->save();
            Session::flash('success', 'Thêm chương thành công');
        } catch (\Exception $e) {
            Session::flash('error', 'Thêm thất bại');
            Log::info($e->getMessage());
            return false;
        }
        return true;
    }

    public function destroy($request) {
        $id = $request->input('id');
        $value = chuong::where('id', $id)->first();
        if ($value) {
            return chuong::where('id', $id)->delete();
        }
        return false;
    }
}