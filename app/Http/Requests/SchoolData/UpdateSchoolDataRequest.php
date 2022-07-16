<?php

namespace App\Http\Requests\SchoolData;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSchoolDataRequest extends FormRequest
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
            'school_name' => 'required',
            'school_principal' => 'required',
            'address' => 'required',
            'city' => 'required',
            'country' => 'required',
            'school_phone' => 'required',
            'national_position' => 'required',
            'avarage_score' => 'required',
        ];
    }
}
