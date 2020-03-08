<?php

namespace App\Http\Handle\Department;

use App\Http\Handle\Interfaces\DeleteInterface;
use App\Models\Department;
use Illuminate\Support\Facades\DB;

class DepartmentDeleteHandler implements DeleteInterface
{
	private $request;

	public function __construct($request)
	{
		$this->request = $request;
	}

	public function delete()
	{
		$id = $this->request->id;

		try {
			DB::beginTransaction();
			$department = Department::find($id);
			$department->delete();
			DB::commit();
			return true;
		} catch (Exception $e) {
			DB::rollback();
			return false;
		}
	}
}