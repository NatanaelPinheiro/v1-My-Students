<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_name',
        'cpf',
        'birth_date',
        'gender',
        'father_name',
        'mother_name',
        'country',
        'address',
        'city',
        'email_address',
        'student_phone',
        'student_phonety',
    ];

    protected $dates = ['birth_date'];

    protected $guarded = [];

    public function schoolClass()
    {
        return $this->belongsTo('App\Models\SchoolClass');
    }
}
