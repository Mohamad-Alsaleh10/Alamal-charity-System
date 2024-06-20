<?php

namespace App;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Training;
use App\Attendancesemployee;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['name', 'email', 'mobile' ,'position' , 'address'];

    public function attendancesemployee()
    {
        return $this->hasMany(Attendancesemployee::class);
    }

    public function trainings()
    {
        return $this->belongsToMany(Training::class, 'training_participants');
    }
}


