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
		<li class="active">Department Create</li>
	</ol>
</section>

<br>

<div class="row">
	<div class="col-md-12">
		<div class="box-body">
			@if(session()->has('message'))
			<div class="bg-info">{{ session('message') }}</div>
			@endif

			{!! Form::model($department,['url' => $department ? 'department/'.$department->id.'/update' : 'department/store', 'method' => $department ? 'PUT' : 'POST']) !!}

			<div class="form-group">
				<label for="exampleInputEmail1">Department Name</label>
				{!! Form::text('department_name',null,['class' => 'form-control']) !!}	
				<div class="error">{{ $errors->first('department_name') }}</div>	
			</div>

			<div class="box-footer">
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>

			{!! Form::close() !!}
		</div>
	</div>
</div>
@stop