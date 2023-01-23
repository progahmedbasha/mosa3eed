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
            'contact_name'=> 'required|min:2|max:250',
            'email' => 'required|email|max:200',
            'phone' => 'required|min:4|max:20',  
            'country_id' => 'required',
            'city_id' => 'required',
            'district_id' => 'required',
            'address' => 'required|max:400',
            'type' => 'required',
            'status' => 'required',
            ///owner
            'owner_name' => 'max:400',
            'owner_phone'=> 'max:400',
            'owner_email'=> 'max:400',
            'owner_password'=> 'max:400',
            //branch
            'branch_name_en'=> 'max:400',
            'branch_name_ar'=> 'max:400',
            'branch_phone_1'=> 'max:400',
            'branch_phone_2'=> 'max:400',
            'branch_email'=> 'max:400',
            'branch_address'=> 'max:400',
            // admin
            'admin_name'=> 'max:400',
            'admin_email'=> 'max:400',
            'admin_phone'=> 'max:400',
            'admin_password'=> 'max:400',
            // shift
            'shift_name'=> 'max:400',

        ];
    }
}
