<?php

namespace Alumni\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Account extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
          'fname' => 'required|alpha_spaces|min:3|max:255',
          'midname' => 'bail|alpha_spaces|min:3|max:255',
          'lastname' => 'required|alpha_spaces|min:3|max:255',
          'department' => 'required|alpha_spaces|min:3|max:255',
          'position' => 'required|alpha_spaces|min:3|max:255',
          'password' => 'required|different:username|min:6|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\X]).+$/|confirmed' ,
           'image_path' => 'image|mimes:jpeg,png,jpg|max:2048',
          'username' => 'required|unique:admin,username|min:5|max:255',
        ];
    }
}
