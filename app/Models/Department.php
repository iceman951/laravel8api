<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $table = 'departments';
    // protected $primaryKey = 'd_id'; //กรณี pk เป็นชื่ออื่นที่ไม่ใช่ id
    // protected $keyType = 'string'; //กรณี pk เป็น varchar
    // public $incrementing = false; //pk ไม่ได้เป็น auto_increment
    // public $timestamps = false;//ตารางไม่มีคอลัมน์ created_at updated_at ในตาราง

    //one to many
    public function officers() {
        // return $this->hasMany(Officer::class);
        return $this->hasMany(Officer::class, 'department_id', 'id');
    }  



}
