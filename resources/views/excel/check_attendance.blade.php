@extends('layout')
@section('content')
    {!! Form::open(array('id' => 'view.attendance', 'class' => 'form-horizontal row-border')) !!}

   <div class="form-group {{ $errors->has('file') ? 'has-error' : ''}}  {{ $errors->has('employee_id') ? 'has-error' : ''}}">
	  <div class="col-md-4">
	    {!! Form::select('employee_id', $employees, null, ['class' => 'form-control required', 'id' => 'employee_id', 'placeholder' => 'Select Employee','required' => 'true']) !!}
	  </div>


	  <div class="col-md-4">
	    {!! Form::text('monthyer', null, ['class' => 'month-pick form-control required', 'id' => 'monthyer', 'placeholder' => 'Select Month and year','required' => 'true']) !!}
	  </div>

	  <div class="col-md-3">
	  	{!! Form:: button('Search', ['class' => 'btn btn-success', 'id' => 'search']) !!}
	  </div> 
	  {!! $errors->first('file', '<span class="help-inline">:message</span>') !!}
	</div>
{!!form::close()!!}
@endsection

@section('customJs')
<script>
$('#search').click(function() {
	var employee_id = $('#employee_id').val();
	var monthyear   = $('#monthyer').val();

	if(monthyear != '' && employee_id != '') {
		var month = monthyear.substring(0, 2); 
		var year  = monthyear.substring(3, 7);

		var base_route = "{{ URL::to('/') }}";
		window.location = base_route + '/excel/view/' + employee_id +'/'+month+'/'+year;
	}
});
</script>
@stop