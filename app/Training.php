<?php

namespace App;

use App\Employee;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    protected $fillable = ['training_name', 'trainer_name', 'training_place' ,'training_type' ,'training_hours' ];
    public function participants()
    {
        return $this->belongsToMany(Employee::class, 'training_participants');
    }
}
