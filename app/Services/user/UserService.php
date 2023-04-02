<?php
namespace App\Services\user;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use App\Models\User;

class UserService {
    public function getUsers() {
        return User::orderBy('id', 'asc')->get();
    }

    public function getUser($id) {
        return User::orderBy('id', 'asc')->where('id', $id)->get();
    }

    public function update($request, $id) {
        try {
            $id->fill([
                'name' => $request->name,
                'fullname' => $request->fullname,
                'email' => $request->email,
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

    public function destroy($id) {
        $value = user::where('id', $id)->first();
        if ($value) {
            return user::where('id', $id)->delete();
        }
        return false;
    }

    public static function getName($id) {
        $value = '';
        $results = user::select('name')->where('id', $id)->get();
        foreach($results as $result) {
            $value = $result->name;
        }
        return $value;
    }
}

?>