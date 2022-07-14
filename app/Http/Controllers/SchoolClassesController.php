<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SchoolClass;

class SchoolClassesController extends Controller
{
    public function index()
    {
        $search = request('search');

        if ($search) {
            $schoolclasses = SchoolClass::where('class_name', 'like', '%'.$search.'%')->paginate(10);
        } else {
            $schoolclasses = SchoolClass::paginate(10);
        }

        return view('school.schoolclasses', compact('schoolclasses', 'search'));
    }

    public function show($id)
    {
        $schoolclass = SchoolClass::findOrFail($id);
        return view('actions.classes.show', compact('schoolclass'));
    }

    public function create()
    {
        return view('actions.classes.create');
    }

    public function store(Request $request)
    {
        $schoolclass = new SchoolClass();
        $request->validate([
            'class_name' => 'required',
            'grade' => 'required',
            'course_coordinator' => 'required',
        ]);
        $schoolclass->class_name = $request->class_name;
        $schoolclass->grade = $request->grade;
        $schoolclass->course_coordinator = $request->course_coordinator;
        $schoolclass->save();

        return redirect(route('classes.index'))->with('msg', 'turma criada com sucesso!');
    }

    public function edit($id)
    {
        $schoolclass = SchoolClass::findOrFail($id);
        return view('actions.classes.edit', compact('schoolclass'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'class_name' => 'required',
            'grade' => 'required',
            'course_coordinator' => 'required',
        ]);

        $schoolclass = SchoolClass::findOrFail($request->id)->update($request->all());
        return redirect(route('classes.index'))->with('msg', 'turma editada com sucesso!');
    }

    public function destroy(Request $request)
    {
        try {
            SchoolClass::findOrFail($request->schoolclass_id)->delete();
        } catch (\Exception $e) {
            return redirect(route('classes.index'))->with('msg', 'Erro: Há alunos inscritos nessa classe. Para continuar, remova esses alunos.');
        }

        return redirect(route('classes.index'))->with('msg', 'classe deletada com sucesso!');
    }
}
