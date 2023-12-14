<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProgramUpdateRequest extends FormRequest
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
            'code' => ['required', 'string', 'max:50'],
            'description' => ['required', 'string'],
            'logo' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:20'],
            'work_lines' => ['required', 'string', 'max:45'],
            'resolution' => ['required', 'string', 'max:255'],
            'register_date' => ['required', 'date'],
            'modality' => ['required', 'string', 'max:60'],
            'user_id' => ['required', 'integer', 'exists:users,id'],
        ];
    }
}
