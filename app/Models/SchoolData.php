<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolData extends Model
{
    use HasFactory;

    protected $fillable = [
        'school_name',
        'school_principal',
        'address',
        'city',
        'country',
        'school_phone',
        'national_position',
        'avarage_score',
    ];
}
