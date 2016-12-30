<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel, Validator, Input, Redirect;

use App\Employee, App\Attendance;
class ExcelsController extends Controller
{

	public function home() {
		$employees = Employee::where('status', 1)->orderBy('name', 'ASC')->pluck('name', 'id')->toArray();
		return view('excel.home', compact('employees'));
	}

	public function upload() {
		$employees = Employee::where('status', 1)->orderBy('name', 'ASC')->pluck('name', 'id')->toArray();
		return view('excel.upload', compact('employees'));
	}

    public function postUploadCsv(Request $request)
	{
	    $rules = array(
	        'file' => 'required',
	    );

	    $validator = Validator::make(Input::all(), $rules);
	    // process the form
	    if ($validator->fails()) 
	    {
	        return Redirect::back()->withErrors($validator)->withInput();
	    }
	    else 
	    {
	        Excel::load(Input::file('file'), function ($reader) use($request){

            	$arr = $reader->toArray();
            	$data = [];
            	$working_hours = 0; 
            	foreach ($arr[0] as $k => $v) { 
            		$data['employee_id'] 	= $request->employee_id;
            		$data['date'] 		 	= date('Y-m-d', strtotime($v['att_date']));
            		$data['in_time'] 		= $v['intime'];
            		$data['our_time'] 		= $v['outtime'];

            		$duration = $v['tot_dur'];
            		$duration = explode(':', $duration);
            		$hr  = $duration[0];
            		$min = $duration[1];

            		$duration = $hr*60+$min;

            		$data['total_duration']	= $duration;
            		$data['status'] 		= $v['status'];
  
            		Attendance::create($data);
            	}
            });
	        $monthyear = $request->monthyear;
	        $monthyear = explode('/', $monthyear);
	        $month = $monthyear[0];
	        $year  = $monthyear[1];
            return Redirect::route('view.attendance', [$request->employee_id,$month, $year]);
	    } 
	} 

	public function checkAttendance() {
		$employees = Employee::where('status', 1)->orderBy('name', 'ASC')->pluck('name', 'id')->toArray();
		return view('excel.check_attendance', compact('employees'));
	}

	public function viewAttendance($employee_id, $month, $year) {
		$employee = Employee::findOrFail($employee_id);
		$result = Attendance::where('employee_id',$employee_id)->where('date', '>=', date($year.'-'.$month.'-1'))->where('date', '<=', date($year.'-'.$month.'-31'))->get();

		return view('excel.view', compact('result', 'employee', 'month', 'year'));
	}

	private function isWeekend($date) {
	    return (date('N', strtotime($date)) >= 6);
	}
}
