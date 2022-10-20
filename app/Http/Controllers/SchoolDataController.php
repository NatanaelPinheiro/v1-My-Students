<?php

namespace App\Http\Controllers;

use App\Models\SchoolData;
use App\Http\Requests\SchoolData\UpdateSchoolDataRequest;

class SchoolDataController extends Controller
{
    public function index()
    {
        $schooldata = SchoolData::all();
        return view('school.schooldata', compact('schooldata'));
    }

    public function fetchSchoolData(){
        $schooldata = SchoolData::first()->get();
        
        return response()->json([
            'schooldata' => $schooldata,
        ]);
    }

    public function edit($id)
    {
        $schooldata = SchoolData::findOrFail($id);
        return view('actions.school.edit', compact('schooldata'));
    }

    public function update(UpdateSchoolDataRequest $request)
    {
        SchoolData::findOrFail($request->id)->update($request->validated());

        return redirect(route('schooldata.index'))->with('msg', 'dados atualizados com sucesso!');
    }
}
