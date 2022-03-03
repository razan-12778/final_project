<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;


class Student extends Authenticatable
{
    use SoftDeletes;

    protected $primaryKey = 'id';
    protected $fillable = ['id','name','email','password','phone','avatar'];
    public $incrementing = false;
    public function getAvatar()
    {
        return asset('storage/'.$this->avatar);
    }
    public function absences()
    {
        return $this->hasMany(Absence::class);
    }
}
