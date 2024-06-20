<?php

namespace App;

use App\Employee;
use App\Training;
use Illuminate\Database\Eloquent\Model;

class TrainingParticipant extends Model
{
    protected $fillable = ['employee_id', 'training_id'];
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function training()
    {
        return $this->belongsTo(Training::class);
    }
}
