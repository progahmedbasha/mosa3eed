<?php

namespace App\Http\Requests\BranchShift;

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
            // 'day'=> 'max:250',
            // 'from' => 'max:250',
            // 'to' => 'max:250',
        ];
    }
}
