<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function welcome() {
        return view('welcome');
    }

    public function register_view() {
        return view('auth.register');
    }

    public function register(RegisterRequest $request) {
        $avatar = "";

        if($request->file('avatar')) {
            $ext = $request->file('avatar')->extension();
            $avatar = time() . '.' . $ext;
            $request->file('avatar')->move(public_path('assets/uploads/avatars'), $avatar);
        }

        $data = [
            'name' => $request['name'],
            'avatar' => $avatar,
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ];

        $register = User::create($data);
            if($register) {
                return redirect()
                    ->route('login_view')
                    ->with('success', 'Account successfully created!');
            }
    }

    public function login_view() {
        return view('auth.login');
    }


    public function login(LoginRequest $request) {
        $data = [
            'email' => $request['email'],
            'password' => $request['password']
        ];

        if(Auth::attempt($data)) {
            return redirect()->route('home');
        } else {
            return back()->with("fail", "Incorrect Login or password!");
        }
    }


    public function home() {
        return view('dash.index');
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('login_view');
    }

    //api
    public function index() {

        return User::all();
    }

    public function delete($id) {
        $user = User::find($id);
        $delete = $user->delete();

        if($delete) {
            return redirect()
                ->route('register_view')
                ->with('success', 'Your Account deleted');
        }
    }
}
