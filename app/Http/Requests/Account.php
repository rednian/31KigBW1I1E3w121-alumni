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
          'fname' => 'required|alpha|min:3|max:255',
          'midname' => 'required|alpha|max:255',
          'lastname' => 'required|alpha|max:255',
          'department' => 'required|alpha|max:255',
          'position' => 'required|max:255',
          'password' => 'required|confirmed|min:6|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\X])(?=.*[!$#%]).*$/|',
//          'image_path' => 'required|max:255',
          'username' => 'required|unique:admin,username|max:255',
        ];
    }
}
