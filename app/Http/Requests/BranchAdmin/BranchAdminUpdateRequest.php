<?php

namespace App\Http\Requests\BranchAdmin;
use Illuminate\Foundation\Http\FormRequest;

class BranchAdminUpdateRequest extends FormRequest
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
            'phone' => 'required|min:4|max:20',
            'email' => 'required|min:2|max:30',
            'password' => 'max:50|required_with:re-password|same:re-password',
            're-password' => 'max:50',  
        ];
    }
}
