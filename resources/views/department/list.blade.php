@extends('layouts')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Department
		<small>Control panel</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Department List</li>
	</ol>
</section>

<br>

<section class="content">
	@if(session()->has('message'))
	<div class="bg-info">{{ session('message') }}</div>
	@endif
	<a href="{{ url('department/create') }}" class="btn btn-primary">Add Department</a>
	<table class="table table-hover">
		<tr>
			<th>Serial No.</th>
			<th>Department Name</th>
			<th>Action</th>
		</tr>
		@foreach($departments as $department)
		<tr>
			<td>{{ $loop->iteration }}</td>
			<td>{{ $department->department_name }}</td>
			<td>
				<a href="{{ url('department/edit?id='.$department->id) }}" class="btn btn-sm btn-success">Edit</a>
				<a onclick="return confirm('Are you sure want to delete this item?')" href="{{ url('department/delete?id='.$department->id) }}" class="btn btn-sm btn-danger">Delete</a>
			</td>
		</tr>
		@endforeach
	</table>
</section>

@stop