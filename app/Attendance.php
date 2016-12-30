<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = array('employee_id', 'date', 'in_time', 'out_time', 'total_duration', 'status');
	protected $table    = 'attendances';
    protected $guarded  = ['_token'];

    public static $rules = [
    	'employee_id' 		=>  'required|exists:employees,id',
    	'date'				=> 	'required',
    	'in_time'  			=>  'required',
    	'out_time'  		=>  'required',
        'total_duration'    =>  'required',
    ];

  	public function employee()
	{
		return $this->belongsTo('App\Employee', 'employee_id');
	}
}
