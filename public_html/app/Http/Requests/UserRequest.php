<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UserRequest extends FormRequest
{    
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {

        if ($this->isMethod('PUT')) 
        {
            // When updating, validate unique email except for the current user's email
            $emailRule = 'required|email|unique:users,email,' . $this->user->id;
        }
        else 
        {
            // For store method, validate unique email
            $emailRule = 'required|email|unique:users,email';
        }
    
        return [
            'name' => 'required',
            'email' => $emailRule,
            'contact_no' => 'required',
            'designation' => 'required',
        ];
    }

}
