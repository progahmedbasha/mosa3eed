<?php

namespace App\Http\Requests\Branch;

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
            'phone_1'=> 'required|min:4|max:15',
            'phone_2'=> 'max:15',
            'email' => 'required|email|max:200',
            'country_id' => 'required',
            'city_id' => 'required',
            'district_id' => 'required',
            'organization_id' => 'required',
            'address' => 'required|max:400',
        ];
    }
}
