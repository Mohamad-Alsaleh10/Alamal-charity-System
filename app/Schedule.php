<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\Subject; 
use App\Models\Grade;
use App\Models\Classroom;
use App\Models\Teacher;
class Schedule extends Model
{
    protected $fillable = [
        'subject_id', 'grade_id', 'classroom_id', 'teacher_id', 'day', 'start_time', 'end_time'
    ];


    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

}
