@extends('layout')
@section('content')
<div class="col-xs-12">
    <h2>Emp Att Sheet : {{ ucwords($employee->name) }}</h2>

    <table class="table table-bordered">
    	<thead>
    		<tr>
    			<th>#</th>
    			<th>Date</th>
    			<th>In Time</th>
    			<th>Out Time</th>
                <th>Total Dutration</th>
    			<th>Status</th>
    		</tr>
    	</thead>

    	<tbody>
            <?php  $total_duration = 0; ?>
    		@foreach($result as $k => $v)

            <?php if(isWeekend($v->date)){?>
            <tr>
                <td colspan="3">SUNDAY</td>
                <td>Total Work Duration</td>
                <td> {{ sprintf("%02d:%02d", floor($total_duration/60), $total_duration%60) }} </td>
            </tr>
            <?php $total_duration = 0; ?>
            <?php }else{ ?>
    		<tr>
    			<td> {{ $k+1}} </td>
    			<td> {{ date('d-m-Y', strtotime($v->date)) }} </td>
    			<td> {{ $v->in_time }} </td>
    			<td> {{ $v->out_time }} </td>
                <td> {{ sprintf("%02d:%02d", floor($v->total_duration/60), $v->total_duration%60) }} </td>
    			<td> {{ $v->status }} </td>
    		</tr>
            <?php $total_duration += $v->total_duration; ?>
            <?php } ?>
    		@endforeach
    	</tbody>
    </table>
</div>
<?php
function isWeekend($date) {
    return (date('N', strtotime($date)) >= 7);
}
?>
@endsection