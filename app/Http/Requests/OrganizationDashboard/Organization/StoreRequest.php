<?php

namespace App\Http\Requests\OrganizationDashboard\Organization;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name'=> 'required|min:2|max:250',
            'phone' => 'required|min:9|max:15',  
            'email' => 'required|email|max:200',
            'country_id' => 'required',
            'city_id' => 'required',
            'district_id' => 'required',
            'password' => 'max:100|same:re-password',
            're-password' => 'max:100',
    
        ];
    }
}