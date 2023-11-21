<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
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
            'slider_title'=>'required',
            'slider_content'=>'required',
            'slider_lang'=>'required',
            'slider_image'=>'required',
            'slider_status'=>'required',
         ];
    }
    public function messages(): array
    {
        return [
            'slider_title.required' => 'Le titre est requis, veuillez ne pas le laisser vide !',
            'slider_content.required' => 'Le contenu est requis, veuillez ne pas le laisser vide !',
            'slider_lang.required' => 'La langue est requise, veuillez ne pas laisser vide !',
            'slider_image.required' => "L'image est requise, veuillez ne pas laisser vide !",
            'slider_status.required' => 'Le statut est requis, veuillez ne pas le laisser vide !',
        ];
    }
}
