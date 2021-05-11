<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Auth;
use App\User;

class AuthRequest extends FormRequest
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
        $users = User::get();
        return [
            'name'     => 'required',
            'email'    => 'required|email|unique:users,email,'.$this->id,
            'password' => 'required',
            'phone'    => 'numeric',
            'role'     => 'required',
            'image'    => 'required',
            
        ];
    }
}
