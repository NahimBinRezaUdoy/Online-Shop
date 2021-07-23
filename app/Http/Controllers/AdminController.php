<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function loginStore(Request $request)
    {
        // $admin = Admin::where(['email' => $request->email])->first();
        // if ($admin && $request->password == $admin->password) {
        //     dd('success');
        // } else {
        //     dd('fail');
        // }

        $email = $request->post('email');
        $password = $request->post('password');

        $result = Admin::where(['email' => $email, 'password' => $password])->get();

        if (isset($result['0']->id)) {
            $request->session()->put('ADMIN_LOGIN', true);
            $request->session()->put('ADMIN_ID', $result['0']->id);
            return redirect()->route('admin.dashboard');
        } else {
            $request->session()->flash('error', 'Please Enter Valid Login Details');
            return redirect()->back();
        }
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }
}
