<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StoreSocialMediaSettings extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // Implement your authorization logic here
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
            'settings.social_media.*' => 'nullable|url'
        ];
    }

    /**
     * Get the custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'settings.social_media.*.required' => ':attribute must have a valid URL',
            'settings.social_media.*.url' => ':attribute must have a valid URL'
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        $attributes = [];
        $inputData = $this->input('settings.social_media', []);

        foreach ($inputData as $key => $value) {
            $attributes["settings.social_media.$key"] = Str::title(str_replace('_', ' ', $key));
        }

        return $attributes;
    }
}