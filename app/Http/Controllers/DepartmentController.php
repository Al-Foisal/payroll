<?php

namespace App\Http\Controllers;

use App\Http\Handle\Department\DepartmentDeleteHandler;
use App\Http\Handle\Department\DepartmentStoreUpdateHandler;
use App\Http\Requests\DepartmentRequest;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
    	$data = [];
        $data['departments'] = Department::paginate();
    	return view('department.list',$data);
    }

    public function create()
    {
    	$data['department'] = null;
    	return view('department.create_update',$data);
    }

    public function store(DepartmentRequest $request)
    {
    	if((new DepartmentStoreUpdateHandler($request))->StoreUpadate()){
    		$message = $request->id ? 'Department Updated Successfully!!' : 'Department Created Successfully!!';
    		session()->flash('message', $message);
    		return redirect('department/list');
    	}

    	session()->flash('message','Something went wrong');
    	return redirect()->back();
    }

    public function edit(Request $request)
    {
    	$data['department'] = Department::find($request->id);
    	return view('department.create_update',$data);
    }

    public function delete(Request $request)
    {
    	if((new DepartmentDeleteHandler($request))->delete()){
    		session()->flash('message','Department deleted successfully!!');
    		return redirect('department/list');
    	}
    	session::flash('message', 'Data Deleted Failed!!');
        return redirect('department/list');
    }
}
