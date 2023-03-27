<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Model
{
    use HasFactory ,SoftDeletes;
    protected $table = 'teachers';
    protected $fillable =['name','bio','phone','date_of_birth'];

    public function department()
    {

        return $this->belongsTo(Department::class,'department_id');
    }
}
