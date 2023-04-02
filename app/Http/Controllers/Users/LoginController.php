<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\SessionUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function index() {
        return view('admin.users.login', [
            'title' => 'Đăng Nhập Hệ Thống'
        ]);
    }

    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt([
                'name' => $request->input('name'),
                'password' => $request->input('password')
            ])) {
            return redirect()->route('default');
        }
        Session::flash('error', 'Name hoặc Password không chính xác');
        return redirect()->back();
    }

    public function login(Request $request) {
        $dataCheckLogin = [
            'name' => $request->name,
            'password' => $request->password
        ];

        if (auth()->attempt($dataCheckLogin)) {
            $checkTokenExit = SessionUser::where('user_id', auth()->id())->first();
            if (empty($checkTokenExit)) {
                $userSession = SessionUser::create([
                    'token' => Str::random(40),
                    'refresh_token' => Str::random(40),
                    'token_expried' => date('Y-m-d H:i:s', strtotime('+30 day')),
                    'refresh_token_expried' => date('Y-m-d H:i:s', strtotime('+360 day')),
                    'user_id' => auth()->id()
                ]);
            } else {
                $userSession = $checkTokenExit;
            }
        }

        if ($userSession) {
            return response()->json(true, 200);
        } else {
            return response()->json(false);
        }
    }
}
