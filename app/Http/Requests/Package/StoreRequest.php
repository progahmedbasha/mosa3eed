<?php

namespace App\Http\Requests\Package;

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
            'subject'=> 'required|max:200',
            'price'=> 'required|max:200',
            'number_days'=> 'required|max:200',
            'user_type_id'=> 'required',
            'offer'=> 'required|max:200',
            'description'=> 'max:200',
        ];
    }
}
