<?php

namespace App\Http\Requests\OrganizationDashboard\purchases;

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
            'branch_id' => 'required',
            'medicin_id' => 'required',
            'acd' => 'required|min:2|max:150',
            'type_measurement' => 'required',
            'due_date'=> 'required|min:2|max:150',
            'qty'=> 'required|max:150',
        ];
    }
}
