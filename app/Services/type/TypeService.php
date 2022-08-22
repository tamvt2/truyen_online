<?php
namespace App\Services\type;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use App\Models\the_loai;

class TypeService {
    public function insert($request) {
        try {
            the_loai::create([
                'ten_loai' => $request->input('type')
            ]);
            Session::flash('success', 'Thêm thể loại thành công');
        } catch (\Exception $e) {
            Session::flash('error', 'Thêm thất bại');
            Log::info($e->getMessage());
            return false;
        }
        return true;
    }

    public function getAll() {
        return the_loai::orderBy('id', 'asc')->paginate(15);
    }

    public function update($request, $id) {
        try {
            $id->fill([
                'ten_loai' => $request->input('type')
            ]);
            $id->save();
            Session::flash('success', 'Cập nhật loại thành công');
        } catch (\Exception $e) {
            Session::flash('error', 'Cập nhật thất bại');
            Log::info($e->getMessage());
            return false;
        }
        return true;
    }

    public function destroy($request) {
        $id = $request->input('id');
        $value = the_loai::where('id', $id)->first();
        if ($value) {
            return the_loai::where('id', $id)->delete();
        }
        return false;
    }

    public static function getTL($id) {
        $values = the_loai::select('ten_loai')->where('id', $id)->get();
        $result = '';
        foreach($values as $value) {
            $result = $value->ten_loai;
        }
        return $result;
    }
}
?>