<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeacherStoreRequest extends FormRequest
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
            'identification' => ['required', 'string'],
            'name' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:50'],
            'address' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:15'],
            'email' => ['required', 'email', 'max:255'],
            'birth_date' => ['required', 'date'],
            'photo' => ['required', 'string', 'max:255'],
            'academic_formation' => ['required', 'string'],
            'knowledge_areas' => ['required', 'string'],
        ];
    }
}
