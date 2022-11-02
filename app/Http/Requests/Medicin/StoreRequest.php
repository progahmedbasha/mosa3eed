<?php

namespace App\Http\Requests\Medicin;

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
            'barcode'=> 'required|max:250',
            'price'=> 'required|max:250',
        ];
    }
}
