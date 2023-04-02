<?php
namespace App\Services\comment;
use App\Models\Comment;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;


class CommentService {
    public function insert($request) {
        try {
            $time = date("Y-m-d H:i:s", time());
            comment::create([
                'truyen_id' => $request->input('truyen_id'),
                'user_id' => $request->input('user_id'),
                'noi_dung' => $request->input('noi_dung'),
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
        return comment::orderBy('id', 'asc')->paginate(15);
    }

    public function update($request, $id) {
        try {
            $time = date("Y-m-d H:i:s", time());
            $id->fill([
                'truyen_id' => $request->input('truyen_id'),
                'user_id' => $request->input('user_id'),
                'noi_dung' => $request->input('noi_dung'),
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
        $value = comment::where('id', $id)->first();
        if ($value) {
            return comment::where('id', $id)->delete();
        }
        return false;
    }

    public function add($request) {
        try {
            $time = date("Y-m-d H:i:s", time());
            Comment::create([
                'truyen_id' => $request->truyen_id,
                'user_id' => $request->user_id,
                'noi_dung' => $request->noi_dung,
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

    public function comment($id) {
        return Comment::orderBy('id', 'asc')->where('truyen_id', $id)->get();
    }

    public function edit($request, $id) {
        try {
            $time = date("Y-m-d H:i:s", time());
            Comment::create([
                'truyen_id' => $request->truyen_id,
                'user_id' => $request->user_id,
                'noi_dung' => $request->noi_dung,
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

    public function delete($id) {
        $value = Comment::where('id', $id)->first();
        if ($value) {
            return Comment::where('id', $id)->delete();
        }
        return false;
    }
}
?>