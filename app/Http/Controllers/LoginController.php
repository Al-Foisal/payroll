<?php

namespace App\Http\Controllers;

use App\Http\Handle\Login\LoginHandler;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
    	return view('login');
    }

    public function loginAttempt(LoginRequest $request)
    {
    	if((new LoginHandler($request))->handle()){
    		return redirect('dashboard');
    	}

    	session()->flash('message','Invalid Authentication');
    	return back();
    }
}
