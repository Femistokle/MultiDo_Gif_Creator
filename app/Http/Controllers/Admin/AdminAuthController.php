<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminAuthController extends Controller
{

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function getLogin()
    {
        $action = __FUNCTION__;
        return view('admin.login.login', compact('action'));
    }

    public function postLogin(Request $request)
    {

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (auth()->guard('admin')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')]))
        {
            $user = auth()->guard('admin')->user();

            return redirect()->route('admin.teachers.all');

        } else {
            return back()->with('error','your username and password are wrong.');
        }

    }

    public function logout()
    {
        auth()->guard('admin')->logout();
        session()->flush();
        session()->flash('success','You are logout successfully');
        return redirect(route('admin.login'));
    }
}
