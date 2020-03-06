<?php

namespace App\Http\Handle\Register;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class RegisterHandler
{
	private $request;

	public function __construct($request)
	{
		$this->request = $request;
	}

	public function handle()
	{
		try {
			DB::beginTransaction();
			$user = new User();
			$user->name = $this->request->name;
			$user->email = $this->request->email;
			$user->password = bcrypt($this->request->password);
			$user->save();
			DB::commit();
			return true;
		} catch (Exception $e) {
			DB::rollback();
			return false;
		}
	}


}