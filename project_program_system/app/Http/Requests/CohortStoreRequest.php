<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CohortStoreRequest extends FormRequest
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
            'code' => ['required', 'string', 'max:15'],
            'name' => ['required', 'string', 'max:255'],
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date'],
            'total_students' => ['required', 'string'],
            'program_id' => ['required', 'integer', 'exists:programs,id'],
        ];
    }
}
