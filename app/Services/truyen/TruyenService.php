<?php
namespace App\Services\truyen;

use App\Models\truyen;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;


class TruyenService {
    public function insert($request) {
        try {
            $time = date("Y-m-d", time());
            truyen::create([
                'the_loai_id' => $request->input('type'),
                'ten_truyen' => $request->input('ten_truyen'),
                'thumb' => $request->input('thumb'),
                'tac_gia' => $request->input('tac_gia'),
                'mota_ngan' => $request->input('mota_ngan'),
                'ngay_dang' => $time
            ]);
            Session::flash('success', 'Thêm truyện thành công');
        } catch (\Exception $e) {
            Session::flash('error', 'Thêm thất bại');
            Log::info($e->getMessage());
            return false;
        }
        return true;
    }

    public function getAll() {
        return truyen::orderBy('id', 'asc')->paginate(15);
    }

    public function update($request, $id) {
        try {
            $time = date("Y-m-d", time());
            $id->fill([
                'the_loai_id' => $request->input('type'),
                'ten_truyen' => $request->input('ten_truyen'),
                'thumb' => $request->input('thumb'),
                'tac_gia' => $request->input('tac_gia'),
                'mota_ngan' => $request->input('mota_ngan'),
                'ngay_dang' => $time
            ]);
            $id->save();
            Session::flash('success', 'Cập nhật truyện thành công');
        } catch (\Exception $e) {
            Session::flash('error', 'Cập nhật thất bại');
            Log::info($e->getMessage());
            return false;
        }
        return true;
    }

    public function destroy($request) {
        $id = $request->input('id');
        $value = truyen::where('id', $id)->first();
        if ($value) {
            return truyen::where('id', $id)->delete();
        }
        return false;
    }

    public static function getTT($id) {
        $value = '';
        $results = truyen::select('ten_truyen')->where('id', $id)->get();
        foreach($results as $result) {
            $value = $result->ten_truyen;
        }
        return $value;
    }
}