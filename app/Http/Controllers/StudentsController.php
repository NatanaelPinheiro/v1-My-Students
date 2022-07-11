<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\SchoolClass;

class StudentsController extends Controller
{
    public function index(){
        $search = request('search');

        if($search){
            $students = Student::where('student_name', 'like', '%'.$search.'%')->paginate(10);
        }else{
            $students = Student::paginate(10);
        }

        return view('school/students', compact('students', 'search'));
    }

    public function show($id){
        $student = Student::findOrFail($id);
        $schoolclasses = SchoolClass::all();
        return view('actions.students.show', compact('student', 'schoolclasses'));
    }

    public function create(){
        $schoolclasses = SchoolClass::all();
        return view('actions.students.create', compact('schoolclasses'));
    }

    public function store(Request $request){
        $student = new Student;

        $request->validate([
            'student_name' => 'required',
            'cpf' => 'required',
            'birth_date' => 'required',
            'gender' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
            'country' => 'required',
            'address' => 'required',
            'city' => 'required',
            'email_address' => 'required',
            'student_phone' => 'required',
            'emergency_phone' => 'required',
            'school_class_id' => 'required',
        ]);

        $student->student_name = $request->student_name;
        $student->cpf = $request->cpf;
        $student->birth_date = $request->birth_date;
        $student->gender = $request->gender;
        $student->father_name = $request->father_name;
        $student->mother_name = $request->mother_name;
        $student->country = $request->country;
        $student->address = $request->address;
        $student->city = $request->city;
        $student->email_address = $request->email_address;
        $student->student_phone = $request->student_phone;
        $student->emergency_phone = $request->emergency_phone;

        $student->school_class_id = $request->school_class_id; 

        $student->save();
        return redirect(route('students.index'))->with('msg', 'estudante adicionado com sucesso!');
    }

    public function edit($id){
        $student = Student::findOrFail($id);
        $schoolclasses = SchoolClass::all();
        return view('actions.students.edit', compact('student', 'schoolclasses'));
    }

    public function update(Request $request){
        $request->validate([
            'student_name' => 'required',
            'cpf' => 'required',
            'birth_date' => 'required',
            'gender' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
            'country' => 'required',
            'address' => 'required',
            'city' => 'required',
            'email_address' => 'required',
            'student_phone' => 'required',
            'emergency_phone' => 'required',
            'school_class_id' => 'required',
        ]);

        $student = Student::findOrFail($request->id);
        $student->school_class_id = $request->school_class_id;
        $student->update($request->all());
        return redirect(route('students.index'))->with('msg', 'estudante editado com sucesso!');
    }

    public function destroy(Request $request){
        Student::findOrFail($request->student_id)->delete();
        return redirect(route('students.index'))->with('msg', 'estudante deletado com sucesso!');
    }

}
