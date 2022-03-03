<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
    use HasFactory;

    protected $fillable = ['file', 'student_id', 'reply', 'replied_by','status'];

    public function getFile()
    {

        return asset('storage/'.$this->file);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'replied_by', 'id');
    }

}
