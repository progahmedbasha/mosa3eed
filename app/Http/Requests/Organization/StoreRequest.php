<?php

namespace App\Http\Requests\Organization;

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
            'name_en'=> 'required|min:2|max:250',
            'name_ar' => 'required|min:2|max:250',
            'contact_en'=> 'required|min:2|max:250',
            'contact_ar'=> 'required|min:2|max:250',
            'email' => 'required|email|max:200',
            'phone' => 'required|min:9|max:15',  
            'country_id' => 'required',
            'city_id' => 'required',
            'district_id' => 'required',
            'address' => 'required|max:400',
             'type' => 'required',
             'status' => 'required',
        ];
    }
}
