<?php

namespace App\Http\Requests;

use App\Rules\UserPassword;
use Illuminate\Foundation\Http\FormRequest;

class LoginStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->guest();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|min:6|max:255|email|exists:users,email',
            'password' => [
                'required',
                'min:6',
                'max:255',
                new UserPassword($this->input('email'))],
        ];
    }
}
