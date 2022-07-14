<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Student;
use App\Models\SchoolClass;
use App\Models\SchoolData;

class Controller extends BaseController
{
    use AuthorizesRequests;
    use DispatchesJobs;
    use ValidatesRequests;

    public function index()
    {
        $students = Student::orderBy('created_at', 'desc')->get();
        $schoolclasses = SchoolClass::orderBy('created_at', 'desc')->get();
        $schooldata = SchoolData::orderBy('created_at', 'desc')->first()->get();
        return view('welcome', compact('students', 'schoolclasses', 'schooldata'));
    }
}
