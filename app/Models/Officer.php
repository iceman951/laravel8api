<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Officer extends Model
{
    use HasFactory;

    protected $table = 'officers';

    //เพิ่ม getter ไปยัง json
    protected $appends = ['fullname', 'age'];

    //getter (Accessor)
    public function getFullnameAttribute()
    { //fullname
        return $this->firstname . ' ' . $this->lastname;
    }

    public function getAgeAttribute()
    { //age
        return now()->diffInYears($this->dob);
    }

    //many to one
    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,  'user_id', 'id');
    }
}
