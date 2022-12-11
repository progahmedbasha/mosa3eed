<?php

namespace App\Http\Requests\Employee;
use Illuminate\Foundation\Http\FormRequest;

class Store_Employee_Request extends FormRequest
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
            'phone' => 'required|min:9|max:15',  
            'branch_id' => 'required', 
            'organization_id' => 'required',    
        ];
    }
}
