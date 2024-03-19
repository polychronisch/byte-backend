<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CandidateRequest extends FormRequest
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
            'lastName' => 'required|string|max:255',
            'firstName' => 'required|string|max:255',
            'email' => 'required|email|unique:candidates,email',
            'mobile' => 'string|max:10',
            'degree_id' => 'required|integer',
            'resume' => 'string', // Example validation for file upload (PDF, max size: 2MB)
        ];
    }
}
