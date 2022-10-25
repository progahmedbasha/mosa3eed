<?php

namespace App\Http\Requests\JobPost;

use Illuminate\Foundation\Http\FormRequest;

class JobPostRequest extends FormRequest
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
                'subject'=> 'required|min:2|max:250',
                'job_title_id' => 'required',
                'organization_id' => 'required',
                'district_id' => '|max:350',
                'breif'=> 'required|min:2|max:250',
                'experince'=> 'required|min:2|max:250',
                'status'=> 'required',
                'expected_salary'=> 'required|min:2|max:250',
                'email_contract'=> 'required|email',
                'phone_contract'=> 'required|min:2|max:15',
        ];
    }
}
