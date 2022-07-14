<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SchoolData;

class SchoolDataController extends Controller
{
    public function index()
    {
        $schooldata = SchoolData::all();
        return view('school.schooldata', compact('schooldata'));
    }

    public function edit($id)
    {
        $schooldata = SchoolData::findOrFail($id);
        return view('actions.school.edit', compact('schooldata'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'school_name' => 'required',
            'school_principal' => 'required',
            'address' => 'required',
            'city' => 'required',
            'country' => 'required',
            'school_phone' => 'required',
            'national_position' => 'required',
            'avarage_score' => 'required',
        ]);

        SchoolData::findOrFail($request->id)->update($request->all());
        return redirect(route('schooldata.index'))->with('msg', 'dados atualizados com sucesso!');
    }
}
