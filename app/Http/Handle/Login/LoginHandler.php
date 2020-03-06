<?php

namespace App\Http\Handle\Login;

use Illuminate\Support\Facades\Auth;

class LoginHandler
{
	private $request;

	public function __construct($request)
	{
		$this->request = $request;
	}

	public function handle()
	{
		$is_valid = Auth::attempt([
			'email' => $this->request->email,
			'password' => $this->request->password,
		]);
		if($is_valid)
			return true;
		else
			return false;
	}
}