<?php

namespace App\Http\Controllers;

use App\Http\Handle\Register\RegisterHandler;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
	public function register()
	{
		return view('register');
	}

	public function registerAttempt(RegisterRequest $request)
	{
		if((new RegisterHandler($request))->handle()){
			session()->flash('message','Register successful');
			return redirect('/');
		}
		return back();
	}
}
