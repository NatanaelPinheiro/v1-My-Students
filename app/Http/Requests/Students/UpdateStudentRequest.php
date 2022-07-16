<?php

namespace App\Http\Requests\Students;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
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
        ];
    }
}
