<?php
namespace App\Http\Controllers\Users;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\user\UserService;
use Illuminate\Http\Request;

class UserController extends Controller{
    protected $user;
    public function __construct(UserService $user) {
        $this->user = $user;
    }

    public function users() {
        return response()->json($this->user->getUsers());
    }

    public function user($id) {
        return response()->json($this->user->getUser($id));
    }

    public function update(Request $request, user $id) {
        $result = $this->user->update($request, $id);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Sửa thành công'
            ]);
        }
        return response()->json([
            'error' => true,
            'message' => 'Sửa thất bại'
        ]);
    }

    public function destroy($id) {
        $result = $this->user->destroy($id);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công'
            ]);
        }
        return response()->json([
            'error' => true,
            'message' => 'Xóa thất bại'
        ]);
    }
}