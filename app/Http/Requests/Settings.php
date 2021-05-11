<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Settings extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return True;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title_site' => 'required',
            'email'      => 'required',
            'phone'      => 'required',
            'tax'        => 'required|max:2'
        ];
    }
}
