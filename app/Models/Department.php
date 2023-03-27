<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use HasFactory;

    protected $table = 'departments';
    protected $fillable = ['title','description',];

    public function students()
    {
        return $this->hasMany(Student::class);

    }
    public function teachers()
    {
        return $this->hasMany(Teacher::class);
    }
}
