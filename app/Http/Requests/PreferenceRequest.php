<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PreferenceRequest extends FormRequest
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
            'name' => 'required_unless:form_type,edit',
            'title' => 'required_unless:form_type,edit',
            'subtitle' => 'required_unless:form_type,edit',
            'phone' => 'required_unless:form_type,edit|numeric',
            'location' => 'required_unless:form_type,edit',
            'cover_image' => 'required_unless:form_type,edit|image|mimes:png,jpg,jpeg,svg',
            'back_image' => 'required_unless:form_type,edit|image|mimes:png,jpg,jpeg,svg',
            'open_sunday' => 'required_unless:form_type,edit|before:close_sunday',
            'open_saturday' => 'required_unless:form_type,edit|before:close_saturday',
            'open_monday' => 'required_unless:form_type,edit|before:close_monday',
            'close_sunday' => 'required_unless:form_type,edit',
            'close_saturday' => 'required_unless:form_type,edit',
            'close_monday' => 'required_unless:form_type,edit',
            'facebook_link' => 'required_unless:form_type,edit',
            'instagram_link' => 'required_unless:form_type,edit',
            'whatsapp_link' => 'required_unless:form_type,edit',
        ];
    }
}
