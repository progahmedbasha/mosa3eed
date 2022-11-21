<?php

namespace App\Http\Requests\BranchDashboard\PostTimeline;

use Illuminate\Foundation\Http\FormRequest;

class PostTimelineRequest extends FormRequest
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
            'post' => 'required|min:2|max:2000',
        ];
 
    }
}
