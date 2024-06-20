<?php

namespace App;

use App\Employee;
use Illuminate\Database\Eloquent\Model;

class Attendancesemployee extends Model
{
    protected $fillable = ['employee_id', 'date', 'status'];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
