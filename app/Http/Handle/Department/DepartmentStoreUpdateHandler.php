<?php

namespace App\Http\Handle\Department;

use App\Http\Handle\Interfaces\StoreUpdateInterface;
use App\Models\Department;
use Illuminate\Support\Facades\DB;

class DepartmentStoreUpdateHandler implements StoreUpdateInterface
{
	private $request;

	public function __construct($request)
	{
		$this->request = $request;
	}

	public function StoreUpadate()
	{
		$id = $this->request->id ?? null;

		try {
			DB::beginTransaction();
			$department = Department::findOrNew($id);
			$department->department_name = $this->request->department_name;
			$department->save();
			DB::commit();
			return true;
		} catch (Exception $e) {
			DB::rollback();
			return false;
		}
	}
}