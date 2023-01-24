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
            'effective_material_id'=> 'required',
            'medicin_shape_id' => 'required',
            'tags' => 'required|max:250',
            'description' => 'required|max:1000',
            'producing_company' => 'required|max:250',
            'medicin_type_id' => 'required',
            'expected_discount' => 'required|numeric',
            'big' => 'required|numeric',
            'center' => 'required|numeric',
            'small' => 'required|numeric',
        ];
    }
}