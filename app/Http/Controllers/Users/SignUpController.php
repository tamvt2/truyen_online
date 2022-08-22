<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SignUpController extends Controller
{
    public function index() {
        return view('admin.users.register', [
            'title' => 'Đăng Ký Tài Khoản'
        ]);
    }

    public function register(RegisterRequest $request) {
        $user = User::create($request->validated());

        return redirect('login')->with('success', "Account successfully registered.");
    }
}
