<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name'=> 'required|min:2|max:150',
            'email' => 'required|email|max:200',
            'password' => 'max:25',
            'phone' => 'required|min:9|max:15',  
            'user_type_id' => 'required',
            'country_id' => 'required', 
            'city_id' => 'required', 
            'district_id' => 'required', 
            'organization_id' => 'required',   
        ];
    }
}