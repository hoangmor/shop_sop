<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
    public function login(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->input();
            if(Auth::attempt(['email' => $data['email'], 'password' => $data['password'], 'is_admin' => 1])){
                return redirect()->route( 'admin.dashboard' );
            }else{
                return redirect()->route( 'admin.home' )->with('error', 'Post was successfully added!');
            }
        }
        return view('admin.admin_login');
    }

    public function dashboard(){
        return view('admin.dashboard');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route( 'admin.home' );
    }
}
