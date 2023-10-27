<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactFormRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'required|string|min:2',
            'email'=>'required|email',
            'subject'=>'required',
            'message'=>'required'
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'rsg_002',
            'name.string' => 'rsg_003',
            'name.min' => 'rsg_004',
            'email.required' => 'rsg_005',
            'email.email' => 'rsg_006',
            'subject.required' => 'rsg_007',
            'message.required' => 'rsg_008',
        ];
    }
}
