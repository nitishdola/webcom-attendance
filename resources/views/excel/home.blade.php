@extends('layout')
@section('content')
    {!! Form::open(array('route' => 'excel.post.upload', 'id' => 'excel.post.upload', 'class' => 'form-horizontal row-border', 'files' => true)) !!}

   <div class="form-group {{ $errors->has('file') ? 'has-error' : ''}}  {{ $errors->has('employee_id') ? 'has-error' : ''}}">

   		<div class="col-md-4">
	    {!! Form::text('monthyear', null, ['class' => 'month-pick form-control required', 'id' => 'monthyer', 'placeholder' => 'Select Month and year','required' => 'true']) !!}
	  </div>

	  <div class="col-md-4">
	    {!! Form::select('employee_id', $employees, null, ['class' => 'form-control required', 'id' => 'employee_id', 'placeholder' => 'Select Employee','required' => 'true']) !!}
	  </div>

	  <div class="col-md-4">
	    {!! Form::file('file', null, ['class' => 'form-control required', 'id' => 'file', 'placeholder' => 'Upload Excel File','required' => 'true']) !!}
	  </div>

	  
	 </div>

	<div class="form-group">

	  <div class="col-md-12">
	  	{!! Form:: submit('Submit', ['class' => 'btn btn-success']) !!}
	  </div> 
	  {!! $errors->first('file', '<span class="help-inline">:message</span>') !!}
	</div>
{!!form::close()!!}
@endsection