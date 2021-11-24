<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;

class MainController extends Controller
{
    function index(){
        return view('login');
    }

    function checkLogin(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|alphaNum'
        ]);

        $user_data = array(
            'email' => $request->get('email'),
            'password' => $request->get('password')
        );

        if(Auth::attempt($user_data)){
            return redirect('login/successlogin');
        }else{
            return back()->with('error', 'Incorrect Login Details');
        }
    }

    function successlogin(){
        return view('welcome');
    }

    function logout(){
        Auth::logout();
        return redirect('login');
    }
}
