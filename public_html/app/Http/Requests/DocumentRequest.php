<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocumentRequest extends FormRequest
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

            return $this->document->file == ''? [
                'cat_id' => 'required',
                'name' => 'required',
                'file' => 'required',
            ]: [
                'cat_id' => 'required',
                'name' => 'required',
            ];

        }
        else 
        {
            
            return [
                'cat_id' => 'required',
                'name' => 'required',
                'file' => 'required',
            ];
        }
        
    }

    public function messages(): array
    {
        return [
            'cat_id' => 'The Category is required',
        ];
    }
}
