<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentUpdateRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'identification' => ['required', 'string', 'max:15'],
            'name' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:50'],
            'address' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:15'],
            'email' => ['required', 'email', 'max:255'],
            'birth_date' => ['required', 'date'],
            'photo' => ['required', 'string', 'max:255'],
            'student_code' => ['required', 'string', 'max:255'],
            'semester' => ['required', 'string'],
            'civil:status' => ['required', 'string', 'max:45'],
            'join_date' => ['required', 'date'],
            'egress_date' => ['required', 'date'],
            'cohort' => ['required', 'string'],
            'cohort_id' => ['required', 'integer', 'exists:cohorts,id'],
        ];
    }
}
