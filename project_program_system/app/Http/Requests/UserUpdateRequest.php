<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'link_date' => ['required', 'date'],
            'agreement' => ['required', 'string', 'max:255'],
            'password' => ['required', 'password', 'max:45'],
            'role' => ['required', 'string', 'max:50'],
            'job' => ['required', 'string', 'max:100'],
        ];
    }
}
