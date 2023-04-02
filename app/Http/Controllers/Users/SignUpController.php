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
        if ($user) {
            return redirect('login')->with('success', "Account successfully registered.");
        } else {
            return redirect('register')->with('error', "Account error registered");
        }
    }

    public function signup(Request $request) {
        $userCreate = User::create([
            'name' => $request->name,
            'fullname' => $request->fullname,
            'email' => $request->email,
            'password' => $request->password
        ]);

        if ($userCreate) {
            return response()->json(true, 201);
        } else {
            return response()->json(false);
        }
        
    }
}
