<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CreatePasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'image'=> 'required',
            'user_id' => 'required|unique:users,id,'.Auth::user()->id,
            'category_id' => 'required|exists:password_categories,id', 
            'password' => 'required|confirmed',
            'description' => 'required',
            'note' => 'required'
        ];
    }
}
