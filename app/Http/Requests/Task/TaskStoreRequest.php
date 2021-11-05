<?php

namespace App\Http\Requests\Task;

use Illuminate\Foundation\Http\FormRequest;

class TaskStoreRequest extends FormRequest
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
            'description'   =>['required','string'],
            'created_at'    =>['required','date','date_format:Y-m-d'],
            'deadline'      =>['required','date','date_format:Y-m-d'],
            'categories'    =>['required'],
            'end_flag'      =>['required','boolean'],
            'assign'        =>['required','exists:users,id'],
        ];
    }
}
